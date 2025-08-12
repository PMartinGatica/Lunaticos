<?php
require __DIR__ . '/../bootstrap.php';

// SKUs a verificar
$skus_to_check = [
    'BZPNTRIVNIN6', 'BZPNTBOCNIN6', 'BZPNTAFANIN6', 'BZPNTBARNIN8', 'BZPNTCHENIN8',
    'BZPNTMILNIN8', 'BZPNTMADNIN8', 'BZPNTLIVNIN8', 'BZPNTRIVNIN8', 'BZPNTAFANIN8',
    'BZPNTBOCNIN8', 'BZPNTRIVNIN10', 'BZPNTBOCNIN10', 'BZPNTAFANIN10', 'BZPNTCHENIN10',
    'BZPNTMADNIN10', 'BZPNTMILNIN10', 'BZPNTLIVNIN10', 'BZPNTBARNIN10', 'BZPNTRIVNIN12',
    'BZPNTBOCNIN12', 'BZPNTMADNIN12', 'BZPNTBARNIN12', 'BZPNTAFANIN12', 'BZPNTMILNIN12',
    'BZPNTCHENIN12', 'BZPNTLIVNIN12', 'BZPNTRIVNIN14', 'BZPNTBOCNIN14', 'BZPNTMADNIN14',
    'BZPNTBARNIN14', 'BZPNTAFANIN14', 'BZPNTMILNIN14', 'BZPNTCHENIN14', 'BZPNTLIVNIN14',
    'BZPNTRIVNIN16', 'BZPNTBOCNIN16', 'BZPNTMADNIN16', 'BZPNTBARNIN16', 'BZPNTAFANIN16',
    'BZPNTMILNIN16', 'BZPNTCHENIN16', 'BZPNTLIVNIN16', 'CMPPNTRIVNIN4', 'CMPPNTRIVNIN6',
    'CMPPNTBOCNIN6', 'CMPPNTAFANIN6', 'CMPPNTBOCNIN8', 'CMPPNTAFANIN8', 'CMPPNTRIVNIN10',
    'CMPPNTBOCNIN10', 'CMPPNTJUVNIN10', 'CMPPNTAFANIN10', 'CMPPNTAFANIN12', 'CMPPNTBARNIN12',
    'CMPPNTRIVNIN16', 'CMPAFANIN8', 'CMPAFANIN10', 'CMPRIVNIN10', 'CMPBOCNIN10',
    'CMPBOCNIN12', 'CMPBOCNIN14', 'CMPRIVNIN14', 'CMPAFANIN14', 'CMPAFANIN16',
    'CMPBOCNIN16', 'BZRIVNIN8', 'BZBOCNIN8', 'BZAFANIN8', 'BZCITNIN8',
    'BZBARNIN8', 'BZRIVNIN10', 'BZAFANIN10', 'BZBOCNIN10', 'BZRACNIN10',
    'BZCITNIN10', 'BZAFANIN12', 'BZRIVNIN12', 'BZBOCNIN12', 'BZAFANIN14',
    'BZRIVNIN14', 'BZBOCNIN14', 'BZAFANIN16', 'BZRIVNIN16', 'BZBOCNIN16',
    'BZRACNIN16', 'BZRIVADUS', 'BZBOCADUS', 'BZAFAADUS', 'BZPSGADUS',
    'BZBARADUS', 'BZLIVADUS', 'BZMADADUS', 'BZCHEADUS', 'BZRIVADUM',
    'BZBOCADUM', 'BZAFAADUM', 'BZPSGADUM', 'BZBARADUM', 'BZMADADUM',
    'BZRACADUM', 'BZMIAADUM', 'BZRIVADUL', 'BZBOCADUL', 'BZAFAADUL',
    'BZPSGADUL', 'BZBARADUL', 'BZMADADUL', 'BZRACADUL', 'BZCHEADUL',
    'BZMIAADUL', 'BZCITADUL', 'BZLIVADUL', 'BZMILADUL', 'BZRIVADUXL',
    'BZBOCADUXL', 'BZAFAADUXL', 'BZPSGADUXL', 'BZMIAADUXL', 'BZMADADUXL',
    'BZRACADUXL', 'BZBARADUXL', 'BZCHEADUXL', 'BZLIVADUXL', 'BZCITADUXL',
    'BZRIVADUXXL', 'BZBOCADUXXL', 'BZAFAADUXXL', 'BZMIAADUXXL', 'CMPAFAADUS',
    'CMPNIKADUS', 'CMPADIADUS', 'CMPPSGADUS', 'CMPNIKADUM', 'CMPADIADUM',
    'CMPAFAADUM', 'CMPRIVADUM', 'CMPBOCADUM', 'CMPAFAADUL', 'CMPPSGADUL',
    'CMPNIKADUL', 'CMPADIADUL', 'BZBOCADUL', 'CMPAFAADUXL', 'CMPRIVADUXL',
    'CMPPSGADUXXL', 'CMPAFAADUXXL', 'CMPRIVADUXXL', 'CMPRMPVTRIVM', 'CMPRMPVTAFAM',
    'CMPRMPVTBOCM', 'CMPRMPVTSLOM', 'CMPRMPVTRIVL', 'CMPRMPVTSLOL', 'CMPRMPVTMIAL',
    'CMPRMPVTINDL', 'CMPRMPVTBOCL', 'CMPRMPVTAFAL', 'BZAZUL', 'BZTURL',
    'BZBORL', 'CMPRMPVTRIVXL', 'CMPRMPVTRACXL', 'CMPRMPVTAFAXL', 'CMPRMPVTCENXL',
    'CMPRMPVTINDXL', 'BZNEGXL', 'BZROSXL', 'BZBORXL', 'CMPRMPVTAFAXXL',
    'CMPRMPVTRACXXL', 'CMPRMPVTCENXXL', 'CMPRMPVTRIVXXL', 'CMPRMPVTBOCXXL', 'BZRMPVTNEGXXL',
    'CMPRMPVTRIVXXXXL', 'CMPPNTNIKADUS', 'CMPPNTPSGADUS', 'CMPPNTRIVADUS', 'CMPPNTAFAADUS',
    'CMPPNTRIVADUM', 'CMPPNTRACADUM', 'CMPPNTBOCADUM', 'CMPPNTSLOADUM', 'CMPPNTPSGADUM',
    'CMPPNTADIADUM', 'CMPPNTRIVADUL', 'CMPPNTRACADUL', 'CMPPNTSLOADUL', 'CMPPNTBOCADUL',
    'CMPPNTAFAADUL', 'CMPPNTPSGADUL', 'CMPPNTNIKADUL', 'CMPPNTAFAADUXL', 'CMPPNTRIVADUXL',
    'CMPPNTRACADUXL', 'CMPPNTSLOADUXL', 'CMPPNTBOCADUXL', 'CMPPNTPSGADUXL', 'CMPPNTRIVADUXL',
    'CMPPNTRIVADUXXL', 'CMPPNTBOCADUXXL', 'CMPPNTINDADUXXL', 'PNTAFAADUS', 'PNTRIVADUS',
    'PNTBOCADUS', 'PNTADIADUS', 'PNTNEGADUS', 'PNTINDADUS', 'PNTRIVADUM',
    'PNTNEGADUM', 'PNTBELADUM', 'PNTNIKADUM', 'PNTADIADUM', 'PNTAFAADUL',
    'PNTRIVADUL', 'PNTBOCADUL', 'PNTMIAADUL', 'PNTNIKADUL', 'PNTNIKADUXL',
    'PNTADIADUXL', 'PNTAFAADUXL', 'PNTPSGADUXL', 'PNTRIVADUXL', 'PNTBOCADUXL',
    'PNTRIVADUXXL', 'PNTBOCADUXXXL', 'PNTRIVADUXXXL', 'PNTMIAADUXXXL'
];

echo "=== VERIFICACIÓN DE SKUs EN BASE DE DATOS ===\n\n";

// Estadísticas generales
$total_productos = App\Models\Product::count();
echo "Total de productos en BBDD: {$total_productos}\n";

// Contar SKUs únicos
$total_skus_to_check = count($skus_to_check);
$unique_skus = array_unique($skus_to_check);
$total_unique_skus = count($unique_skus);
echo "SKUs únicos a verificar: {$total_unique_skus}\n";
echo "SKUs duplicados en la lista: " . ($total_skus_to_check - $total_unique_skus) . "\n\n";

// Buscar SKUs existentes
$existing_skus = App\Models\Product::whereIn('sku', $unique_skus)->pluck('sku')->toArray();
$existing_count = count($existing_skus);

echo "=== RESULTADOS ===\n";
echo "SKUs encontrados en BBDD: {$existing_count} de {$total_unique_skus}\n";
echo "SKUs faltantes: " . ($total_unique_skus - $existing_count) . "\n\n";

if ($existing_count > 0) {
    echo "=== SKUs ENCONTRADOS ===\n";
    sort($existing_skus);
    foreach ($existing_skus as $sku) {
        echo "✅ {$sku}\n";
    }
    echo "\n";
}

// SKUs faltantes
$missing_skus = array_diff($unique_skus, $existing_skus);
if (!empty($missing_skus)) {
    echo "=== SKUs FALTANTES ===\n";
    sort($missing_skus);
    foreach ($missing_skus as $sku) {
        echo "❌ {$sku}\n";
    }
    echo "\n";
}

// Verificar duplicados en la lista original
$duplicates = array_diff_assoc($skus_to_check, $unique_skus);
if (!empty($duplicates)) {
    echo "=== SKUs DUPLICADOS EN TU LISTA ===\n";
    $value_counts = array_count_values($skus_to_check);
    foreach ($value_counts as $sku => $count) {
        if ($count > 1) {
            echo "🔄 {$sku} (aparece {$count} veces)\n";
        }
    }
    echo "\n";
}

echo "=== VERIFICACIÓN COMPLETADA ===\n";
