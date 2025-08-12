<?php
// Shared bootstrap for CLI scripts
<?php
// Shared bootstrap for CLI scripts

// Ensure working directory is the project root so relative paths keep working
chdir(dirname(__DIR__));

require_once __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\\Contracts\\Console\\Kernel')->bootstrap();
