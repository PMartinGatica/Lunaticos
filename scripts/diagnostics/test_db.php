<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=lunaticos', 'root', '');
    echo "✅ Conexión MySQL exitosa al puerto 3307\n";
    echo "👤 Usuario: root (sin contraseña)\n\n";
    
    $stmt = $pdo->query('SHOW TABLES');
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "📋 Tablas encontradas (" . count($tables) . "):\n";
    foreach($tables as $table) {
        echo "  - $table\n";
    }
    
    if (in_array('products', $tables)) {
        $stmt = $pdo->query('SELECT COUNT(*) FROM products');
        $count = $stmt->fetchColumn();
        echo "\n🛍️ Productos en base de datos: $count\n";
    } else {
        echo "\n⚠️ Base de datos vacía - necesita ejecutar migraciones\n";
    }
    
} catch(Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
