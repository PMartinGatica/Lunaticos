<?php

use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔄 Iniciando importación de productos faltantes con slugs únicos...\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener productos existentes
$existing_skus = Product::pluck('sku')->toArray();

$productos_importados = 0;
$productos_omitidos = 0;
$errores = 0;

foreach ($csv as $record) {
    $sku = trim($record['SKU'] ?? '');
    
    if (empty($sku)) {
        continue;
    }
    
    // Solo importar productos que no existen
    if (in_array($sku, $existing_skus)) {
        $productos_omitidos++;
        continue;
    }
    
    $name = trim($record['Nombre del Producto'] ?? '');
    $stock = intval($record['Stock Disponible'] ?? 1);
    
    if (empty($name)) {
        continue;
    }
    
    // Generar slug único incluyendo el SKU
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku);
    
    echo "Importando: $sku - $name\n";
    
    try {
        // Crear producto con slug único
        Product::create([
            'name' => $name,
            'sku' => $sku,
            'description' => $name,
            'short_description' => $name,
            'sale_price' => null,
            'stock_quantity' => $stock,
            'manage_stock' => true,
            'stock_status' => 'in_stock',
            'weight' => null,
            'length' => null,
            'width' => null,
            'height' => null,
            'status' => 'published',
            'catalog_visibility' => 'visible',
            'tax_status' => 'taxable',
            'tax_class' => '',
            'sold_individually' => false,
            'purchase_note' => null,
            'slug' => $unique_slug,
        ]);
        
        $productos_importados++;
        echo "✅ Importado correctamente\n";
        
    } catch (Exception $e) {
        $errores++;
        echo "ERROR importando $sku: " . $e->getMessage() . "\n";
    }
}

// Contar productos totales después de la importación
$total_productos = Product::count();

echo "\n=== RESUMEN DE IMPORTACIÓN ===\n";
echo "✅ Productos importados: $productos_importados\n";
echo "⏭️ Productos existentes (omitidos): $productos_omitidos\n";
echo "❌ Errores: $errores\n";
echo "\n📊 Total productos en BBDD ahora: $total_productos\n";
echo "\n=== IMPORTACIÓN COMPLETADA ===\n";

?>
