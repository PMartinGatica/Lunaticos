<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== DEBUG CATEGORÍAS ===\n\n";

try {
    // Test simple sin eager loading
    echo "Test 1: Obtener todas las categorías sin relaciones\n";
    $categories = App\Models\Category::all();
    echo "✅ Categorías obtenidas: " . $categories->count() . "\n\n";
    
    echo "Test 2: Usar scope active sin relaciones\n";
    $activeCategories = App\Models\Category::where('is_active', true)->get();
    echo "✅ Categorías activas: " . $activeCategories->count() . "\n\n";
    
    echo "Test 3: Verificar tabla product_categories\n";
    $tableExists = Illuminate\Support\Facades\Schema::hasTable('product_categories');
    echo "Tabla product_categories existe: " . ($tableExists ? 'SÍ' : 'NO') . "\n\n";
    
    if ($tableExists) {
        echo "Test 4: Contar registros en product_categories\n";
        $count = Illuminate\Support\Facades\DB::table('product_categories')->count();
        echo "Registros en product_categories: {$count}\n\n";
    }
    
    echo "Test 5: Intentar scope active con orderBy\n";
    $ordered = App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
    echo "✅ Categorías ordenadas: " . $ordered->count() . "\n\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Línea: " . $e->getLine() . "\n";
    echo "Archivo: " . $e->getFile() . "\n\n";
}

echo "=== DEBUG COMPLETADO ===\n";
