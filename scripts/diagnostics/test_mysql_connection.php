<?php
echo "🔍 Probando diferentes configuraciones de MySQL...\n\n";

$configs = [
    ['root', ''],           // Usuario root sin contraseña (XAMPP default)
    ['root', 'root'],       // Usuario root con contraseña 'root'
    ['root', 'mysql'],      // Usuario root con contraseña 'mysql'
    ['root', 'admin'],      // Usuario root con contraseña 'admin'
    ['root', '123456'],     // Usuario root con contraseña '123456'
];

$host = '127.0.0.1';
$port = 3306;

foreach ($configs as $index => $config) {
    $username = $config[0];
    $password = $config[1];
    
    echo "🧪 Probando: Usuario='$username', Contraseña='" . ($password ?: '(vacía)') . "'...\n";
    
    try {
        $pdo = new PDO("mysql:host=$host;port=$port;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "✅ ¡CONEXIÓN EXITOSA!\n";
        echo "   Usuario: $username\n";
        echo "   Contraseña: " . ($password ?: '(vacía)') . "\n\n";
        
        // Crear la base de datos
        $sql = "CREATE DATABASE IF NOT EXISTS lunaticos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        $pdo->exec($sql);
        echo "✅ Base de datos 'lunaticos' creada\n";
        
        // Guardar las credenciales correctas
        file_put_contents('mysql_credentials.txt', "DB_USERNAME=$username\nDB_PASSWORD=$password");
        break;
        
    } catch (PDOException $e) {
        echo "❌ Error: " . $e->getMessage() . "\n\n";
    }
}
