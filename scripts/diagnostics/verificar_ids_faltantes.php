<?php

use League\Csv\Reader;
use App\Models\Product;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔍 VERIFICACIÓN DE IDs PARA SKUs FALTANTES\n\n";

// SKUs faltantes del reporte anterior
$skus_faltantes = [
    'BZRMPVTNEGXXL',
    'CMPAFAADUM',
    'CMPAFAADUXXL',
    'CMPNIKADUL',
    'CMPPNTBOCADUXXL',
    'CMPPNTRIVADUM',
    'CMPPNTRIVADUXXL',
    'CMPPSGADUXXL',
    'CMPRIVADUXXL',
    'CMPRMPVTAFAL',
    'CMPRMPVTAFAXL',
    'CMPRMPVTBOCL',
    'CMPRMPVTBOCXXL',
    'CMPRMPVTRIVL',
    'CMPRMPVTRIVXXXXL',
    'PNTADIADUXL',
    'PNTAFAADUL',
    'PNTRIVADUM'
];

// SKUs duplicados
$skus_duplicados = [
    'BZBOCADUL',
    'CMPPNTRIVADUXL'
];

// Leer el CSV para mapear SKU -> ID
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

$sku_to_id = [];
foreach ($csv as $record) {
    $id = intval($record['ID'] ?? 0);
    $sku = trim($record['SKU'] ?? '');
    if ($id > 0 && !empty($sku)) {
        $sku_to_id[$sku] = $id;
    }
}

// Obtener IDs existentes en la BD
$existing_ids = Product::pluck('id')->toArray();

echo "=== ANÁLISIS DE SKUs FALTANTES ===\n";
$ids_faltantes = [];

foreach ($skus_faltantes as $sku) {
    if (isset($sku_to_id[$sku])) {
        $id = $sku_to_id[$sku];
        $existe = in_array($id, $existing_ids);
        $estado = $existe ? "✅ EXISTE" : "❌ FALTA";
        echo "SKU: $sku -> ID: $id -> $estado\n";
        
        if (!$existe) {
            $ids_faltantes[] = $id;
        }
    } else {
        echo "SKU: $sku -> ⚠️  NO ENCONTRADO EN CSV\n";
    }
}

echo "\n=== ANÁLISIS DE SKUs DUPLICADOS ===\n";
foreach ($skus_duplicados as $sku) {
    echo "SKU duplicado: $sku\n";
    // Buscar todas las apariciones en el CSV
    $apariciones = [];
    foreach ($csv as $record) {
        $id = intval($record['ID'] ?? 0);
        $csv_sku = trim($record['SKU'] ?? '');
        if ($csv_sku === $sku && $id > 0) {
            $apariciones[] = $id;
        }
    }
    
    foreach ($apariciones as $id) {
        $existe = in_array($id, $existing_ids);
        $estado = $existe ? "✅ EXISTE" : "❌ FALTA";
        echo "  -> ID: $id -> $estado\n";
        
        if (!$existe) {
            $ids_faltantes[] = $id;
        }
    }
}

$ids_faltantes = array_unique($ids_faltantes);
sort($ids_faltantes);

echo "\n📊 RESUMEN:\n";
echo "- SKUs faltantes analizados: " . count($skus_faltantes) . "\n";
echo "- SKUs duplicados analizados: " . count($skus_duplicados) . "\n";
echo "- IDs que faltan importar: " . count($ids_faltantes) . "\n";

if (!empty($ids_faltantes)) {
    echo "\n🔧 IDs PENDIENTES DE IMPORTAR:\n";
    foreach ($ids_faltantes as $id) {
        echo "- ID: $id\n";
    }
} else {
    echo "\n🎉 TODOS LOS IDs ESTÁN IMPORTADOS\n";
}

echo "\n=== ANÁLISIS COMPLETADO ===\n";

?>
