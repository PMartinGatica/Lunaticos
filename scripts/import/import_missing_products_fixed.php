<?php

require_once 'vendor/autoload.php';

use League\Csv\Reader;
use Illuminate\Support\Str;

// Cargar configuración de Laravel
require_once 'bootstrap/app.php';

// Obtener conexión PDO directa
$pdo = new PDO(
    'mysql:host=127.0.0.1;port=3307;dbname=lunaticos',
    'root',
    'root'
);

// Configurar PDO para que lance excepciones
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "🔄 Iniciando importación de productos faltantes con slugs únicos...\n\n";

// Leer el CSV
$csv = Reader::createFromPath('docs/Inventario Lunáticos - Catalogo.csv', 'r');
$csv->setHeaderOffset(0);

// Obtener productos existentes
$stmt = $pdo->prepare("SELECT sku FROM products");
$stmt->execute();
$existing_skus = array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'sku');

$productos_importados = 0;
$productos_omitidos = 0;
$errores = 0;

foreach ($csv as $record) {
    $sku = trim($record['SKU'] ?? '');
    
    if (empty($sku)) {
        continue;
    }
    
    // Solo importar productos que no existen
    if (in_array($sku, $existing_skus)) {
        $productos_omitidos++;
        continue;
    }
    
    $name = trim($record['Nombre del Producto'] ?? '');
    $stock = intval($record['Stock Disponible'] ?? 1);
    
    if (empty($name)) {
        continue;
    }
    
    // Generar slug único incluyendo el SKU
    $base_slug = Str::slug($name);
    $unique_slug = $base_slug . '-' . strtolower($sku);
    
    echo "Importando: $sku - $name\n";
    
    try {
        // Insertar producto con slug único
        $stmt = $pdo->prepare("
            INSERT INTO products (
                name, sku, description, short_description, sale_price, 
                stock_quantity, manage_stock, stock_status, weight, length, width, height,
                status, catalog_visibility, tax_status, tax_class, sold_individually, 
                purchase_note, slug, updated_at, created_at
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )
        ");
        
        $stmt->execute([
            $name,              // name
            $sku,               // sku
            $name,              // description
            $name,              // short_description
            null,               // sale_price
            $stock,             // stock_quantity
            1,                  // manage_stock
            'in_stock',         // stock_status
            null,               // weight
            null,               // length
            null,               // width
            null,               // height
            'published',        // status
            'visible',          // catalog_visibility
            'taxable',          // tax_status
            '',                 // tax_class
            0,                  // sold_individually
            null,               // purchase_note
            $unique_slug,       // slug único
            date('Y-m-d H:i:s'), // updated_at
            date('Y-m-d H:i:s')  // created_at
        ]);
        
        $productos_importados++;
        echo "✅ Importado correctamente\n";
        
    } catch (Exception $e) {
        $errores++;
        echo "ERROR importando $sku: " . $e->getMessage() . "\n";
    }
}

// Contar productos totales después de la importación
$stmt = $pdo->prepare("SELECT COUNT(*) as total FROM products");
$stmt->execute();
$total_productos = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

echo "\n=== RESUMEN DE IMPORTACIÓN ===\n";
echo "✅ Productos importados: $productos_importados\n";
echo "⏭️ Productos existentes (omitidos): $productos_omitidos\n";
echo "❌ Errores: $errores\n";
echo "\n📊 Total productos en BBDD ahora: $total_productos\n";
echo "\n=== IMPORTACIÓN COMPLETADA ===\n";

?>
