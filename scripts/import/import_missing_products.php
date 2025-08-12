<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use League\Csv\Reader;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;

echo "=== IMPORTACIÓN AUTOMÁTICA DE PRODUCTOS FALTANTES ===\n\n";

// Leer CSV
$csv_path = 'docs/Inventario Lunáticos - Catalogo.csv';
$csv = Reader::createFromPath($csv_path, 'r');
$csv->setHeaderOffset(0);

// Obtener SKUs existentes en la base de datos
$existing_skus = Product::pluck('sku')->toArray();
echo "Productos existentes en BBDD: " . count($existing_skus) . "\n";

$imported_count = 0;
$skipped_count = 0;
$error_count = 0;

foreach ($csv as $index => $record) {
    $sku = trim($record['SKU']);
    
    // Skip si ya existe
    if (in_array($sku, $existing_skus)) {
        $skipped_count++;
        continue;
    }
    
    try {
        echo "Importando: {$sku} - {$record['Nombre']}\n";
        
        // Crear/obtener categoría
        $category_name = $record['Categorías'] ?: 'Sin categoría';
        $category = Category::firstOrCreate(
            ['name' => $category_name],
            ['description' => "Categoría para {$category_name}"]
        );
        
        // Crear/obtener etiquetas
        $tags = [];
        if (!empty($record['Etiquetas'])) {
            $tag_names = array_map('trim', explode(',', $record['Etiquetas']));
            foreach ($tag_names as $tag_name) {
                if (!empty($tag_name)) {
                    $tag = Tag::firstOrCreate(['name' => $tag_name]);
                    $tags[] = $tag->id;
                }
            }
        }
        
        // Preparar datos del producto
        $product_data = [
            'name' => $record['Nombre'],
            'sku' => $sku,
            'description' => $record['Descripción'] ?: $record['Descripción corta'],
            'short_description' => $record['Descripción corta'],
            'price' => !empty($record['Precio normal']) ? (float)$record['Precio normal'] : 0,
            'sale_price' => !empty($record['Precio rebajado']) ? (float)$record['Precio rebajado'] : null,
            'stock_quantity' => !empty($record['Inventario']) ? (int)$record['Inventario'] : 0,
            'manage_stock' => !empty($record['¿En inventario?']) && strtolower($record['¿En inventario?']) === '1',
            'stock_status' => 'in_stock',
            'weight' => !empty($record['Peso (kg)']) ? (float)$record['Peso (kg)'] : null,
            'length' => !empty($record['Longitud (cm)']) ? (float)$record['Longitud (cm)'] : null,
            'width' => !empty($record['Anchura (cm)']) ? (float)$record['Anchura (cm)'] : null,
            'height' => !empty($record['Altura (cm)']) ? (float)$record['Altura (cm)'] : null,
            'status' => !empty($record['Publicado']) && $record['Publicado'] === '1' ? 'published' : 'draft',
            'featured' => !empty($record['¿Está destacado?']) && $record['¿Está destacado?'] === '1',
            'catalog_visibility' => $record['Visibilidad en el catálogo'] ?: 'visible',
            'tax_status' => $record['Estado del impuesto'] ?: 'taxable',
            'tax_class' => $record['Clase de impuesto'] ?: '',
            'sold_individually' => !empty($record['¿Vendido individualmente?']) && $record['¿Vendido individualmente?'] === '1',
            'purchase_note' => $record['Nota de compra'] ?: null,
            'category_id' => $category->id,
            'created_at' => now(),
            'updated_at' => now()
        ];
        
        // Crear producto
        $product = Product::create($product_data);
        
        // Asociar etiquetas
        if (!empty($tags)) {
            $product->tags()->attach($tags);
        }
        
        // Crear atributos si existen
        for ($i = 1; $i <= 3; $i++) {
            $attr_name = $record["Nombre del atributo {$i}"] ?? null;
            $attr_value = $record["Valor(es) del atributo {$i}"] ?? null;
            
            if (!empty($attr_name) && !empty($attr_value)) {
                // Crear/obtener atributo
                $attribute = Attribute::firstOrCreate(
                    ['name' => $attr_name],
                    ['type' => 'text']
                );
                
                // Crear/obtener valor del atributo
                $attribute_value = AttributeValue::firstOrCreate([
                    'attribute_id' => $attribute->id,
                    'value' => $attr_value
                ]);
                
                // Asociar atributo con producto
                ProductAttribute::firstOrCreate([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'attribute_value_id' => $attribute_value->id
                ]);
            }
        }
        
        $imported_count++;
        
    } catch (Exception $e) {
        echo "ERROR importando {$sku}: " . $e->getMessage() . "\n";
        $error_count++;
    }
}

echo "\n=== RESUMEN DE IMPORTACIÓN ===\n";
echo "✅ Productos importados: {$imported_count}\n";
echo "⏭️ Productos existentes (omitidos): {$skipped_count}\n";
echo "❌ Errores: {$error_count}\n";

// Verificación final
$total_products = Product::count();
echo "\n📊 Total productos en BBDD ahora: {$total_products}\n";

echo "\n=== IMPORTACIÓN COMPLETADA ===\n";
