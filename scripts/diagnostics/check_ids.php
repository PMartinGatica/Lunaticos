<?php

use App\Models\Product;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "📋 ANÁLISIS DE IDs EN LA BASE DE DATOS\n\n";

// Obtener todos los productos ordenados por ID
$products = Product::orderBy('id')->get(['id', 'sku', 'name']);

echo "Productos actuales en BD:\n";
foreach($products as $product) {
    echo "ID: {$product->id} - SKU: {$product->sku} - {$product->name}\n";
}

echo "\n📊 ESTADÍSTICAS:\n";
echo "- Total productos: " . $products->count() . "\n";
echo "- ID mínimo: " . $products->min('id') . "\n";
echo "- ID máximo: " . $products->max('id') . "\n";

// Encontrar IDs faltantes
$all_ids = $products->pluck('id')->toArray();
$min_id = $products->min('id');
$max_id = $products->max('id');

$missing_ids = [];
for ($i = $min_id; $i <= $max_id; $i++) {
    if (!in_array($i, $all_ids)) {
        $missing_ids[] = $i;
    }
}

if (!empty($missing_ids)) {
    echo "- IDs faltantes en secuencia: " . implode(', ', $missing_ids) . "\n";
} else {
    echo "- No hay IDs faltantes en la secuencia\n";
}

echo "\n=== ANÁLISIS COMPLETADO ===\n";

?>
