<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require __DIR__ . '/../bootstrap.php';

echo "=== VERIFICACIÓN DE PRODUCTOS ===\n\n";

// Total de productos
$total = App\Models\Product::count();
echo "Total productos en BD: {$total}\n";

// Productos con diferentes status
$publishCount = App\Models\Product::where('status', 'publish')->count();
echo "Productos con status='publish': {$publishCount}\n";

$publishedCount = App\Models\Product::where('status', 'published')->count();
echo "Productos con status='published': {$publishedCount}\n";

// Verificar todos los status diferentes
$allStatus = App\Models\Product::select('status')->distinct()->pluck('status')->toArray();
echo "\nTodos los status encontrados:\n";
foreach ($allStatus as $status) {
    $count = App\Models\Product::where('status', $status)->count();
    echo "- '{$status}': {$count} productos\n";
}

// Verificar el scope active
echo "\nVerificando scope 'active':\n";
try {
    $activeCount = App\Models\Product::active()->count();
    echo "Productos activos (scope active): {$activeCount}\n";
} catch (Exception $e) {
    echo "Error al usar scope active: " . $e->getMessage() . "\n";
}

echo "\n=== VERIFICACIÓN COMPLETADA ===\n";
