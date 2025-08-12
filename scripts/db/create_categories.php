<?php
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== CREANDO CATEGORÍAS BÁSICAS ===\n\n";

try {
    // Verificar si ya existen categorías
    $existingCount = App\Models\Category::count();
    echo "Categorías existentes: {$existingCount}\n";
    
    if ($existingCount == 0) {
        echo "Creando categorías básicas...\n";
        
        $categories = [
            ['name' => 'Camisetas de Fútbol', 'description' => 'Camisetas oficiales de equipos de fútbol', 'is_active' => true, 'sort_order' => 1],
            ['name' => 'Pantalones Deportivos', 'description' => 'Pantalones y shorts deportivos', 'is_active' => true, 'sort_order' => 2],
            ['name' => 'Buzos y Camperas', 'description' => 'Buzos, camperas y rompevientos', 'is_active' => true, 'sort_order' => 3],
            ['name' => 'Niños', 'description' => 'Indumentaria deportiva para niños', 'is_active' => true, 'sort_order' => 4],
            ['name' => 'Adultos', 'description' => 'Indumentaria deportiva para adultos', 'is_active' => true, 'sort_order' => 5],
        ];
        
        foreach ($categories as $categoryData) {
            $category = App\Models\Category::create($categoryData);
            echo "✅ Categoría creada: {$category->name}\n";
        }
        
        echo "\nTotal categorías creadas: " . count($categories) . "\n";
    } else {
        echo "Ya existen categorías en la base de datos.\n";
        
        // Mostrar categorías existentes
        $categories = App\Models\Category::all();
        foreach ($categories as $category) {
            echo "- {$category->name} (activa: " . ($category->is_active ? 'SÍ' : 'NO') . ")\n";
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Detalle: " . $e->getTraceAsString() . "\n";
}

echo "\n=== PROCESO COMPLETADO ===\n";
