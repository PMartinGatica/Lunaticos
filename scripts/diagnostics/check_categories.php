<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
require __DIR__ . '/../bootstrap.php';
use Illuminate\Support\Facades\Schema;

echo "=== VERIFICACIÓN DE CATEGORÍAS ===\n\n";

try {
    // Verificar si la tabla existe
    $tableExists = Schema::hasTable('categories');
    echo "Tabla 'categories' existe: " . ($tableExists ? 'SÍ' : 'NO') . "\n";
    
    if ($tableExists) {
        // Contar categorías
        $total = App\Models\Category::count();
        echo "Total categorías en BD: {$total}\n";
        
        // Categorías activas
        $active = App\Models\Category::where('is_active', true)->count();
        echo "Categorías activas: {$active}\n";
        
        if ($total > 0) {
            echo "\nCategorías existentes:\n";
            $categories = App\Models\Category::all();
            foreach ($categories as $category) {
                echo "- {$category->name} (activa: " . ($category->is_active ? 'SÍ' : 'NO') . ")\n";
            }
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== VERIFICACIÓN COMPLETADA ===\n";
