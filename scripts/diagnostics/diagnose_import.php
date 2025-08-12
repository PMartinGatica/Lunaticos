<?php

use League\Csv\Reader;
use App\Models\Product;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 DIAGNÓSTICO DETALLADO DE IMPORTACIÓN\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener todos los SKUs del CSV
$csv_skus = [];
foreach ($csv as $record) {
    $sku = trim($record['SKU'] ?? '');
    if (!empty($sku)) {
        $csv_skus[] = $sku;
    }
}

// Obtener productos existentes de la BD
$existing_skus = Product::pluck('sku')->toArray();

echo "📊 ESTADÍSTICAS:\n";
echo "- SKUs en CSV: " . count($csv_skus) . "\n";
echo "- SKUs únicos en CSV: " . count(array_unique($csv_skus)) . "\n";
echo "- Productos en BD: " . count($existing_skus) . "\n";
echo "- SKUs únicos en BD: " . count(array_unique($existing_skus)) . "\n\n";

// Encontrar SKUs faltantes
$missing_skus = array_diff($csv_skus, $existing_skus);
echo "📋 SKUs FALTANTES: " . count($missing_skus) . "\n";

// Mostrar los primeros 10 SKUs faltantes para verificar
echo "\n🔍 PRIMEROS 10 SKUs FALTANTES:\n";
$first_10 = array_slice($missing_skus, 0, 10);
foreach ($first_10 as $sku) {
    echo "- $sku\n";
}

// Verificar si hay duplicados en CSV
$duplicates = array_diff_assoc($csv_skus, array_unique($csv_skus));
if (!empty($duplicates)) {
    echo "\n⚠️  DUPLICADOS EN CSV:\n";
    foreach (array_unique($duplicates) as $dup) {
        echo "- $dup\n";
    }
}

echo "\n=== DIAGNÓSTICO COMPLETADO ===\n";

?>
