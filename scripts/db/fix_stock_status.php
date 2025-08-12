<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== ARREGLANDO CAMPO STOCK_STATUS ===\n\n";

try {
    // Modificar el campo stock_status para que tenga más espacio
    DB::statement('ALTER TABLE products MODIFY stock_status VARCHAR(20) DEFAULT "in_stock"');
    echo "✅ Campo stock_status modificado correctamente a VARCHAR(20)\n";
    
    // Verificar el cambio
    $result = DB::select('DESCRIBE products');
    foreach ($result as $column) {
        if ($column->Field === 'stock_status') {
            echo "✅ Nuevo tipo de campo stock_status: {$column->Type}\n";
            break;
        }
    }
    
} catch (Exception $e) {
    echo "❌ Error modificando campo: " . $e->getMessage() . "\n";
}

echo "\n=== CORRECCIÓN COMPLETADA ===\n";
