<?php

use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Str;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🚀 IMPORTACIÓN FINAL DE PRODUCTOS FALTANTES\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener todos los SKUs del CSV
$csv_data = [];
foreach ($csv as $record) {
    $sku = trim($record['SKU'] ?? '');
    if (!empty($sku)) {
        $csv_data[$sku] = [
            'name' => trim($record['Nombre del Producto'] ?? ''),
            'stock' => intval($record['Stock Disponible'] ?? 1)
        ];
    }
}

// Obtener productos existentes de la BD
$existing_skus = Product::pluck('sku')->toArray();

// Encontrar SKUs faltantes
$missing_skus = array_diff(array_keys($csv_data), $existing_skus);

echo "📊 ESTADÍSTICAS PREVIAS:\n";
echo "- Total SKUs únicos en CSV: " . count($csv_data) . "\n";
echo "- Productos ya en BD: " . count($existing_skus) . "\n";
echo "- Productos a importar: " . count($missing_skus) . "\n\n";

$productos_importados = 0;
$errores = 0;

foreach ($missing_skus as $sku) {
    $data = $csv_data[$sku];
    $name = $data['name'];
    $stock = $data['stock'];
    
    if (empty($name)) {
        continue;
    }
    
    // Generar slug único: nombre + SKU
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku);
    
    echo "Importando: $sku - $name (Stock: $stock)\n";
    
    try {
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
        echo "✅ Importado\n";
        
    } catch (Exception $e) {
        $errores++;
        echo "❌ ERROR: " . $e->getMessage() . "\n";
    }
}

// Estadísticas finales
$total_productos = Product::count();

echo "\n=== RESUMEN FINAL ===\n";
echo "✅ Productos importados: $productos_importados\n";
echo "❌ Errores: $errores\n";
echo "📊 Total productos en BD: $total_productos\n";

$esperados = 227; // SKUs únicos del CSV
if ($total_productos >= $esperados) {
    echo "🎉 ¡IMPORTACIÓN COMPLETA! Todos los productos únicos han sido importados.\n";
} else {
    echo "⚠️  Faltan " . ($esperados - $total_productos) . " productos.\n";
}

echo "\n=== IMPORTACIÓN FINALIZADA ===\n";

?>
