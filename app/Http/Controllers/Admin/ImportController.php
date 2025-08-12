<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.import.index');
    }

    public function importProducts(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:10240', // 10MB max
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('csv_file');
            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();
            $imported = 0;
            $errors = [];
            $totalRecords = 0;

            Log::info("Iniciando importación de CSV");

            foreach ($records as $offset => $record) {
                $totalRecords++;
                try {
                    Log::info("Procesando registro", [
                        'linea' => $offset + 2,
                        'sku' => $record['SKU'] ?? 'N/A',
                        'nombre' => $record['Nombre'] ?? 'N/A'
                    ]);
                    
                    $product = $this->importSingleProduct($record);
                    $imported++;
                    
                    Log::info("Producto importado exitosamente", [
                        'id' => $product->id,
                        'sku' => $product->sku,
                        'nombre' => $product->name
                    ]);
                    
                } catch (\Exception $e) {
                    $errorMsg = "Línea " . ($offset + 2) . ": " . $e->getMessage();
                    $errors[] = $errorMsg;
                    
                    Log::error("Error importando producto", [
                        'linea' => $offset + 2,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                        'record' => $record
                    ]);
                }
            }

            DB::commit();

            Log::info("Importación completada", [
                'total_registros' => $totalRecords,
                'importados' => $imported,
                'errores' => count($errors)
            ]);

            $message = "Importación completada. $imported de $totalRecords productos importados.";
            if (!empty($errors)) {
                $message .= " Errores: " . implode(', ', array_slice($errors, 0, 3));
                if (count($errors) > 3) {
                    $message .= " y " . (count($errors) - 3) . " errores más.";
                }
            }

            return redirect()->route('admin.import.index')->with('success', $message);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error en importación masiva', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('admin.import.index')->with('error', 'Error en la importación: ' . $e->getMessage());
        }
    }

    private function importSingleProduct($record)
    {
        // Mapeo de campos del CSV con limpieza de datos
        $data = [
            'id' => $this->cleanValue($record['ID'] ?? null, 'int'),
            'type' => $this->cleanValue($record['Tipo'] ?? 'simple'),
            'sku' => $this->cleanValue($record['SKU'] ?? null),
            'name' => $this->cleanValue($record['Nombre'] ?? null),
            'published' => $this->cleanValue($record['Publicado'] ?? '0', 'bool'),
            'featured' => $this->cleanValue($record['¿Está destacado?'] ?? '0', 'bool'),
            'visibility' => $this->cleanValue($record['Visibilidad en el catálogo'] ?? 'visible'),
            'short_description' => $this->cleanValue($record['Descripción corta'] ?? null),
            'description' => $this->cleanValue($record['Descripción'] ?? null),
            'sale_start_date' => $this->cleanValue($record['Día en que empieza el precio rebajado'] ?? null),
            'sale_end_date' => $this->cleanValue($record['Día en que termina el precio rebajado'] ?? null),
            'tax_status' => $this->cleanValue($record['Estado del impuesto'] ?? 'taxable'),
            'tax_class' => $this->cleanValue($record['Clase de impuesto'] ?? null),
            'manage_stock' => $this->cleanValue($record['¿En inventario?'] ?? '0', 'bool'),
            'stock_quantity' => $this->cleanValue($record['Inventario'] ?? 0, 'int'),
            'low_stock_amount' => $this->cleanValue($record['Cantidad de bajo inventario'] ?? null, 'int'),
            'backorders' => $this->cleanValue($record['¿Permitir reservas de productos agotados?'] ?? '', 'bool') ? 'yes' : 'no',
            'sold_individually' => $this->cleanValue($record['¿Vendido individualmente?'] ?? '0', 'bool'),
            'weight' => $this->cleanValue($record['Peso (kg)'] ?? null, 'float'),
            'length' => $this->cleanValue($record['Longitud (cm)'] ?? null, 'float'),
            'width' => $this->cleanValue($record['Anchura (cm)'] ?? null, 'float'),
            'height' => $this->cleanValue($record['Altura (cm)'] ?? null, 'float'),
            'reviews_allowed' => $this->cleanValue($record['¿Permitir valoraciones de clientes?'] ?? '1', 'bool'),
            'purchase_note' => $this->cleanValue($record['Nota de compra'] ?? null),
            'sale_price' => $this->cleanValue($record['Precio rebajado'] ?? null, 'float'),
            'regular_price' => $this->cleanValue($record['Precio normal'] ?? null, 'float') ?: 15000,
            'categories' => $this->cleanValue($record['Categorías'] ?? null),
            'tags' => $this->cleanValue($record['Etiquetas'] ?? null),
            'shipping_class' => $this->cleanValue($record['Clase de envío'] ?? null),
            'images' => $this->cleanValue($record['Imágenes'] ?? null),
            'download_limit' => $this->cleanValue($record['Límite de descargas'] ?? null, 'int'),
            'download_expiry' => $this->cleanValue($record['Días de caducidad de la descarga'] ?? null, 'int'),
            'parent_id' => $this->cleanValue($record['Superior'] ?? null, 'int'),
            'grouped_products' => $this->cleanValue($record['Productos agrupados'] ?? null),
            'upsells' => $this->cleanValue($record['Ventas dirigidas'] ?? null),
            'cross_sells' => $this->cleanValue($record['Ventas cruzadas'] ?? null),
            'external_url' => $this->cleanValue($record['URL externa'] ?? null),
            'button_text' => $this->cleanValue($record['Texto del botón'] ?? null),
            'menu_order' => $this->cleanValue($record['Posición'] ?? 0, 'int'),
            'attribute_name_1' => $this->cleanValue($record['Nombre del atributo 1'] ?? null),
            'attribute_value_1' => $this->cleanValue($record['Valor(es) del atributo 1'] ?? null),
            'attribute_visible_1' => $this->cleanValue($record['Atributo visible 1'] ?? '1', 'bool'),
            'attribute_global_1' => $this->cleanValue($record['Atributo global 1'] ?? '0', 'bool'),
            'download_name_1' => $this->cleanValue($record['Nombre de la descarga 1'] ?? null),
            'download_url_1' => $this->cleanValue($record['URL de la descarga 1'] ?? null),
        ];

        // Validar campos obligatorios
        if (empty($data['name']) || empty($data['sku'])) {
            throw new \Exception("Nombre y SKU son obligatorios");
        }

        // Verificar si el producto ya existe por SKU
        $existingProduct = Product::where('sku', $data['sku'])->first();
        if ($existingProduct) {
            // Actualizar producto existente
            $product = $existingProduct;
        } else {
            // Crear nuevo producto
            $product = new Product();
        }

        // Mapear datos al modelo Product (solo asignar campos que no son null o tienen valores válidos)
        $fillData = [
            'name' => $data['name'],
            'slug' => \Str::slug($data['name']),
            'sku' => $data['sku'],
            'status' => $data['published'] ? 'published' : 'draft',
        ];

        // Agregar campos opcionales solo si tienen valores válidos
        if ($data['description'] || $data['short_description']) {
            $fillData['description'] = $data['description'] ?: $data['short_description'];
        }
        if ($data['short_description']) {
            $fillData['short_description'] = $data['short_description'];
        }
        if ($data['regular_price'] !== null) {
            $fillData['regular_price'] = $data['regular_price'];
        }
        if ($data['sale_price'] !== null) {
            $fillData['sale_price'] = $data['sale_price'];
        }
        if ($data['stock_quantity'] !== null) {
            $fillData['stock_quantity'] = $data['stock_quantity'];
        }
        if ($data['low_stock_amount'] !== null) {
            $fillData['low_stock_threshold'] = $data['low_stock_amount'];
        }
        if ($data['weight'] !== null) {
            $fillData['weight'] = $data['weight'];
        }
        if ($data['length'] !== null) {
            $fillData['length'] = $data['length'];
        }
        if ($data['width'] !== null) {
            $fillData['width'] = $data['width'];
        }
        if ($data['height'] !== null) {
            $fillData['height'] = $data['height'];
        }
        if ($data['purchase_note']) {
            $fillData['purchase_note'] = $data['purchase_note'];
        }
        if ($data['tax_class']) {
            $fillData['tax_class'] = $data['tax_class'];
        }
        if ($data['shipping_class']) {
            $fillData['shipping_class'] = $data['shipping_class'];
        }
        if ($data['external_url']) {
            $fillData['external_url'] = $data['external_url'];
        }
        if ($data['button_text']) {
            $fillData['button_text'] = $data['button_text'];
        }
        if ($data['download_limit'] !== null) {
            $fillData['download_limit'] = $data['download_limit'];
        }
        if ($data['download_expiry'] !== null) {
            $fillData['download_expiry'] = $data['download_expiry'];
        }
        if ($data['parent_id'] !== null) {
            $fillData['parent_id'] = $data['parent_id'];
        }

        // Campos booleanos - siempre asignar un valor válido (0 o 1)
        $fillData['is_featured'] = $data['featured'] ? 1 : 0;
        $fillData['manage_stock'] = $data['manage_stock'] ? 1 : 0;
        $fillData['sold_individually'] = $data['sold_individually'] ? 1 : 0;
        $fillData['reviews_allowed'] = $data['reviews_allowed'] ? 1 : 0;
        
        // Campos enum - usar valores válidos
        $fillData['catalog_visibility'] = $data['visibility'] ?: 'visible';
        $fillData['tax_status'] = $data['tax_status'] ?: 'taxable';
        $fillData['backorders'] = $data['backorders'] ?: 'no';
        $fillData['menu_order'] = $data['menu_order'] ?: 0;

        $product->fill($fillData);

        $product->save();

        // Procesar categorías
        $this->processCategories($product, $data);

        // Procesar tags
        $this->processTags($product, $data);

        // Procesar atributos
        $this->processAttributes($product, $data);

        return $product;
    }

    private function processCategories($product, $data)
    {
        if (empty($data['categories'])) {
            // Crear categoría basada en el tipo de producto
            $categoryName = $this->determineCategoryFromProduct($data);
        } else {
            $categoryName = $data['categories'];
        }

        if ($categoryName) {
            $category = Category::firstOrCreate(
                ['slug' => \Str::slug($categoryName)],
                [
                    'name' => $categoryName,
                    'description' => "Categoría para productos de $categoryName",
                    'status' => 'active',
                    'sort_order' => 0
                ]
            );

            // Asociar producto con categoría
            $product->categories()->syncWithoutDetaching([$category->id]);
        }
    }

    private function processTags($product, $data)
    {
        $tags = [];

        // Extraer equipo del nombre del producto
        $team = $this->extractTeamFromName($data['name']);
        if ($team) {
            $tag = Tag::firstOrCreate(
                ['slug' => \Str::slug($team)],
                ['name' => $team, 'description' => "Productos del equipo $team"]
            );
            $tags[] = $tag->id;
        }

        // Agregar tags adicionales basados en el tipo de producto
        $productType = $this->getProductTypeFromName($data['name']);
        if ($productType) {
            $tag = Tag::firstOrCreate(
                ['slug' => \Str::slug($productType)],
                ['name' => $productType, 'description' => "Productos tipo $productType"]
            );
            $tags[] = $tag->id;
        }

        if (!empty($tags)) {
            $product->tags()->syncWithoutDetaching($tags);
        }
    }

    private function processAttributes($product, $data)
    {
        // Procesar atributo de talla
        if (!empty($data['attribute_name_1']) && !empty($data['attribute_value_1'])) {
            $attribute = Attribute::firstOrCreate(
                ['slug' => \Str::slug($data['attribute_name_1'])],
                [
                    'name' => $data['attribute_name_1'],
                    'type' => 'select',
                    'has_archives' => true,
                    'is_global' => $data['attribute_global_1'],
                    'sort_order' => 0
                ]
            );

            $attributeValue = AttributeValue::firstOrCreate(
                [
                    'attribute_id' => $attribute->id,
                    'value' => $data['attribute_value_1']
                ],
                [
                    'slug' => \Str::slug($data['attribute_value_1']),
                    'sort_order' => 0
                ]
            );

            // Crear relación producto-atributo
            ProductAttribute::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id
                ],
                [
                    'attribute_value_id' => $attributeValue->id,
                    'is_visible' => $data['attribute_visible_1'],
                    'is_variation' => false,
                    'sort_order' => 0
                ]
            );
        }
    }

    private function determineCategoryFromProduct($data)
    {
        $name = strtolower($data['name']);
        
        if (strpos($name, 'conjunto') !== false) {
            if (strpos($name, 'niño') !== false) {
                return 'Conjuntos Niños';
            } else {
                return 'Conjuntos Adultos';
            }
        } elseif (strpos($name, 'buzo') !== false) {
            if (strpos($name, 'niño') !== false) {
                return 'Buzos Niños';
            } else {
                return 'Buzos Adultos';
            }
        } elseif (strpos($name, 'campera') !== false) {
            if (strpos($name, 'niño') !== false) {
                return 'Camperas Niños';
            } else {
                return 'Camperas Adultos';
            }
        } elseif (strpos($name, 'pantalon') !== false) {
            if (strpos($name, 'niño') !== false) {
                return 'Pantalones Niños';
            } else {
                return 'Pantalones Adultos';
            }
        }
        
        return 'Sin Categoría';
    }

    private function extractTeamFromName($name)
    {
        $teams = [
            'River Plate' => 'River Plate',
            'Boca Juniors' => 'Boca Juniors', 
            'AFA' => 'Selección Argentina',
            'Barcelona' => 'FC Barcelona',
            'Real Madrid' => 'Real Madrid',
            'Chelsea' => 'Chelsea',
            'Liverpool' => 'Liverpool',
            'Manchester City' => 'Manchester City',
            'Milan' => 'AC Milan',
            'PSG' => 'Paris Saint-Germain',
            'Racing' => 'Racing Club',
            'Juventus' => 'Juventus',
            'Inter Miami' => 'Inter Miami',
            'San Lorenzo' => 'San Lorenzo',
            'Independiente' => 'Independiente',
            'Rosario Central' => 'Rosario Central',
        ];

        foreach ($teams as $key => $teamName) {
            if (stripos($name, $key) !== false) {
                return $teamName;
            }
        }

        return null;
    }

    private function getProductTypeFromName($name)
    {
        $name = strtolower($name);
        
        if (strpos($name, 'conjunto') !== false) {
            return 'Conjunto';
        } elseif (strpos($name, 'buzo') !== false) {
            return 'Buzo';
        } elseif (strpos($name, 'campera') !== false) {
            return 'Campera';
        } elseif (strpos($name, 'pantalon') !== false) {
            return 'Pantalón';
        }
        
        return null;
    }

    private function cleanValue($value, $type = 'string')
    {
        // Si es null o string vacío, manejar según el tipo
        if ($value === null || $value === '' || trim($value) === '') {
            switch ($type) {
                case 'bool':
                    return 0; // false por defecto para booleanos
                case 'int':
                case 'float':
                    return null; // null permitido para numéricos
                default:
                    return null;
            }
        }

        // Limpiar espacios
        $value = trim($value);

        switch ($type) {
            case 'int':
                return is_numeric($value) ? (int) $value : null;
            case 'float':
                return is_numeric($value) ? (float) $value : null;
            case 'bool':
                return in_array(strtolower($value), ['1', 'true', 'yes', 'si', 'sí']) ? 1 : 0;
            case 'string':
            default:
                return $value === '' ? null : $value;
        }
    }
}
