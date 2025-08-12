<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use League\Csv\Reader;

echo "=== COMPARACIÓN CSV vs BASE DE DATOS ===\n\n";

// Leer CSV
$csv_path = 'docs/Inventario Lunáticos - Catalogo.csv';
$csv = Reader::createFromPath($csv_path, 'r');
$csv->setHeaderOffset(0);

$csv_skus = [];
$csv_records = [];

foreach ($csv as $record) {
    $sku = trim($record['SKU']);
    if (!empty($sku)) {
        $csv_skus[] = $sku;
        $csv_records[$sku] = $record;
    }
}

echo "Productos en CSV: " . count($csv_skus) . "\n";

// Obtener SKUs de la base de datos
$db_skus = App\Models\Product::pluck('sku')->toArray();
echo "Productos en BBDD: " . count($db_skus) . "\n\n";

// Productos importados correctamente
$imported = array_intersect($csv_skus, $db_skus);
echo "Productos importados exitosamente: " . count($imported) . "\n";

// Productos faltantes
$missing = array_diff($csv_skus, $db_skus);
echo "Productos NO importados: " . count($missing) . "\n\n";

if (!empty($missing)) {
    echo "=== PRODUCTOS NO IMPORTADOS ===\n";
    sort($missing);
    foreach ($missing as $sku) {
        $record = $csv_records[$sku];
        echo "❌ {$sku} - {$record['Nombre']}\n";
    }
    echo "\n";
}

// Verificar si hay productos en BBDD que no están en CSV
$extra_in_db = array_diff($db_skus, $csv_skus);
if (!empty($extra_in_db)) {
    echo "=== PRODUCTOS EN BBDD QUE NO ESTÁN EN CSV ===\n";
    sort($extra_in_db);
    foreach ($extra_in_db as $sku) {
        echo "🔄 {$sku}\n";
    }
    echo "\n";
}

echo "=== ANÁLISIS COMPLETADO ===\n";
