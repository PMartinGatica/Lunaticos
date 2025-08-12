<?php
// Script simple para crear la base de datos
$host = '127.0.0.1';
$port = 3306;
$username = 'root';
$password = '';

try {
    // Conectar sin especificar base de datos
    $pdo = new PDO("mysql:host=$host;port=$port;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear la base de datos
    $sql = "CREATE DATABASE IF NOT EXISTS lunaticos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sql);
    
    echo "✅ Base de datos 'lunaticos' creada exitosamente\n";
    echo "✅ Conexión a MySQL funcionando correctamente\n";
    
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage() . "\n";
    echo "💡 Verifica que XAMPP esté corriendo y el usuario/contraseña sean correctos\n";
}
