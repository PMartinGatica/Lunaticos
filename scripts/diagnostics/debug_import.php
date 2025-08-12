<?php

use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Str;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🐛 DEBUG: IMPORTACIÓN PASO A PASO\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener todos los SKUs del CSV
$csv_data = [];
$count = 0;
foreach ($csv as $record) {
    $sku = trim($record['SKU'] ?? '');
    if (!empty($sku)) {
        $csv_data[$sku] = [
            'name' => trim($record['Nombre del Producto'] ?? ''),
            'stock' => intval($record['Stock Disponible'] ?? 1)
        ];
        $count++;
        if ($count <= 5) {
            echo "CSV: $sku -> " . $csv_data[$sku]['name'] . "\n";
        }
    }
}

echo "\nTotal en CSV: " . count($csv_data) . "\n\n";

// Obtener productos existentes de la BD
$existing_skus = Product::pluck('sku')->toArray();
echo "Productos existentes: " . count($existing_skus) . "\n";
echo "Primeros 5 SKUs existentes:\n";
for ($i = 0; $i < min(5, count($existing_skus)); $i++) {
    echo "BD: " . $existing_skus[$i] . "\n";
}

// Encontrar SKUs faltantes
$missing_skus = array_diff(array_keys($csv_data), $existing_skus);
echo "\nSKUs faltantes: " . count($missing_skus) . "\n";
echo "Primeros 5 SKUs faltantes:\n";
$first_5_missing = array_slice($missing_skus, 0, 5);
foreach ($first_5_missing as $sku) {
    echo "FALTA: $sku -> " . $csv_data[$sku]['name'] . "\n";
}

// Intentar importar solo los primeros 5 para probar
echo "\n🔄 Intentando importar los primeros 5...\n";
$imported = 0;
$errors = 0;

foreach ($first_5_missing as $sku) {
    $data = $csv_data[$sku];
    $name = $data['name'];
    $stock = $data['stock'];
    
    if (empty($name)) {
        echo "SKIP: $sku - Nombre vacío\n";
        continue;
    }
    
    // Generar slug único
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku);
    
    echo "Procesando: $sku - $name -> slug: $unique_slug\n";
    
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
        
        $imported++;
        echo "✅ Importado: $sku\n";
        
    } catch (Exception $e) {
        $errors++;
        echo "❌ ERROR en $sku: " . $e->getMessage() . "\n";
    }
}

echo "\nResultados del test:\n";
echo "Importados: $imported\n";
echo "Errores: $errors\n";
echo "Total en BD ahora: " . Product::count() . "\n";

?>
