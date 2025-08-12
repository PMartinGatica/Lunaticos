<?php

use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🚀 IMPORTACIÓN CON IDs ESPECÍFICOS DEL CSV\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener IDs existentes en la BD
$existing_ids = Product::pluck('id')->toArray();

// Mapear datos del CSV por ID
$csv_data = [];
foreach ($csv as $record) {
    $id = intval($record['ID'] ?? 0);
    $sku = trim($record['SKU'] ?? '');
    $nombre = trim($record['Nombre'] ?? '');
    $stock = intval($record['Inventario'] ?? 1);
    
    if ($id > 0 && !empty($sku) && !empty($nombre)) {
        $csv_data[$id] = [
            'sku' => $sku,
            'name' => $nombre,
            'stock' => $stock
        ];
    }
}

// Encontrar IDs faltantes
$missing_ids = array_diff(array_keys($csv_data), $existing_ids);
sort($missing_ids);

echo "📊 ESTADÍSTICAS:\n";
echo "- Total productos en CSV: " . count($csv_data) . "\n";
echo "- Productos ya en BD: " . count($existing_ids) . "\n";
echo "- IDs a importar: " . count($missing_ids) . "\n\n";

echo "Primeros 10 IDs a importar:\n";
for ($i = 0; $i < min(10, count($missing_ids)); $i++) {
    $id = $missing_ids[$i];
    $data = $csv_data[$id];
    echo "ID $id: {$data['sku']} - {$data['name']} (Stock: {$data['stock']})\n";
}

$productos_importados = 0;
$errores = 0;

echo "\n🔄 Iniciando importación...\n";

foreach ($missing_ids as $id) {
    $data = $csv_data[$id];
    $sku = $data['sku'];
    $name = $data['name'];
    $stock = $data['stock'];
    
    // Generar slug único: nombre + SKU
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku);
    
    echo "Importando ID $id: $sku - $name\n";
    
    try {
        // Crear producto con ID específico
        DB::statement('SET foreign_key_checks=0');
        
        Product::create([
            'id' => $id, // ID específico del CSV
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
            'slug' => $unique_slug,
        ]);
        
        DB::statement('SET foreign_key_checks=1');
        
        $productos_importados++;
        echo "✅ Importado\n";
        
    } catch (Exception $e) {
        $errores++;
        echo "❌ ERROR: " . $e->getMessage() . "\n";
    }
}

// Estadísticas finales
$total_productos = Product::count();

echo "\n=== RESUMEN FINAL ===\n";
echo "✅ Productos importados: $productos_importados\n";
echo "❌ Errores: $errores\n";
echo "📊 Total productos en BD: $total_productos\n";

$esperados = count($csv_data);
if ($total_productos >= $esperados) {
    echo "🎉 ¡IMPORTACIÓN COMPLETA! Todos los productos han sido importados con sus IDs correctos.\n";
} else {
    echo "⚠️  Faltan " . ($esperados - $total_productos) . " productos.\n";
}

echo "\n=== IMPORTACIÓN FINALIZADA ===\n";

?>
