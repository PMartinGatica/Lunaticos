<?php

use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🔄 Iniciando importación completa de productos con ID único...\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener productos existentes POR SKU (ya que cada SKU es único en CSV)
$existing_skus = Product::pluck('sku')->toArray();

$productos_importados = 0;
$productos_omitidos = 0;
$errores = 0;

foreach ($csv as $record) {
    $sku = trim($record['SKU'] ?? '');
    
    if (empty($sku)) {
        continue;
    }
    
    // Solo importar productos que no existen (por SKU)
    if (in_array($sku, $existing_skus)) {
        $productos_omitidos++;
        continue;
    }
    
    $name = trim($record['Nombre del Producto'] ?? '');
    $stock = intval($record['Stock Disponible'] ?? 1);
    
    if (empty($name)) {
        continue;
    }
    
    // Generar slug único incluyendo el SKU para evitar duplicaciones
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku);
    
    echo "Importando: $sku - $name (Stock: $stock)\n";
    
    try {
        // Crear producto con slug único basado en nombre + SKU
        Product::create([
            'name' => $name,
            'sku' => $sku,
            'description' => $name,
            'short_description' => $name,
            'sale_price' => null,
            'stock_quantity' => $stock,
            'manage_stock' => true,
            'stock_status' => 'in_stock',
            'weight' => null,
            'length' => null,
            'width' => null,
            'height' => null,
            'status' => 'published',
            'catalog_visibility' => 'visible',
            'tax_status' => 'taxable',
            'tax_class' => '',
            'sold_individually' => false,
            'purchase_note' => null,
            'slug' => $unique_slug, // Slug único: nombre-sku
        ]);
        
        $productos_importados++;
        echo "✅ Importado correctamente con ID único\n";
        
    } catch (Exception $e) {
        $errores++;
        echo "❌ ERROR importando $sku: " . $e->getMessage() . "\n";
    }
}

// Contar productos totales después de la importación
$total_productos = Product::count();

echo "\n=== RESUMEN DE IMPORTACIÓN COMPLETA ===\n";
echo "✅ Productos importados: $productos_importados\n";
echo "⏭️ Productos ya existentes (omitidos): $productos_omitidos\n";
echo "❌ Errores: $errores\n";
echo "\n📊 Total productos en BBDD ahora: $total_productos\n";

// Verificar si llegamos a los 237 productos esperados
$productos_esperados = 237;
if ($total_productos >= $productos_esperados) {
    echo "🎉 ¡IMPORTACIÓN COMPLETA! Todos los productos del CSV han sido importados.\n";
} else {
    echo "⚠️  Faltan " . ($productos_esperados - $total_productos) . " productos por importar.\n";
}

echo "\n=== IMPORTACIÓN COMPLETADA ===\n";

?>
