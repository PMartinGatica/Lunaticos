<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'port' => '3306',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
]);

$capsule->setAsGlobal();

try {
    $capsule->connection()->statement('CREATE DATABASE IF NOT EXISTS lunaticos CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
    echo "✅ Base de datos 'lunaticos' creada exitosamente\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
