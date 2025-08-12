<?php

use League\Csv\Reader;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

// Incluir Laravel
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "🚀 IMPORTACIÓN DE IDs FALTANTES ESPECÍFICOS\n\n";

// IDs específicos que faltan
$ids_faltantes = [104, 146, 201];

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Mapear datos del CSV por ID
$csv_data = [];
foreach ($csv as $record) {
    $id = intval($record['ID'] ?? 0);
    if (in_array($id, $ids_faltantes)) {
        $sku = trim($record['SKU'] ?? '');
        $nombre = trim($record['Nombre'] ?? '');
        $stock = intval($record['Inventario'] ?? 1);
        
        $csv_data[$id] = [
            'sku' => $sku,
            'name' => $nombre,
            'stock' => $stock
        ];
    }
}

echo "📋 IDs A IMPORTAR:\n";
foreach ($ids_faltantes as $id) {
    if (isset($csv_data[$id])) {
        $data = $csv_data[$id];
        echo "ID $id: {$data['sku']} - {$data['name']} (Stock: {$data['stock']})\n";
    } else {
        echo "ID $id: ⚠️  NO ENCONTRADO EN CSV\n";
    }
}

$productos_importados = 0;
$errores = 0;

echo "\n🔄 Iniciando importación...\n";

foreach ($ids_faltantes as $id) {
    if (!isset($csv_data[$id])) {
        echo "⏭️  Saltando ID $id - No encontrado en CSV\n";
        continue;
    }
    
    $data = $csv_data[$id];
    $sku = $data['sku'];
    $name = $data['name'];
    $stock = $data['stock'];
    
    // Generar slug único: nombre + SKU + ID para evitar duplicados
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku) . '-' . $id;
    
    echo "Importando ID $id: $sku - $name\n";
    
    try {
        // Desactivar verificaciones de claves foráneas temporalmente
        DB::statement('SET foreign_key_checks=0');
        
        Product::create([
            'id' => $id,
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
            'slug' => $unique_slug, // Slug único con ID
        ]);
        
        DB::statement('SET foreign_key_checks=1');
        
        $productos_importados++;
        echo "✅ Importado correctamente\n";
        
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

if ($productos_importados > 0) {
    echo "🎉 ¡IDs faltantes importados exitosamente!\n";
}

echo "\n=== IMPORTACIÓN COMPLETADA ===\n";

?>
