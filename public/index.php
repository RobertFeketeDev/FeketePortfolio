<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

// Útvonalak regisztrálása teszt eljárásokkal (Closure)
$router->get('/', function () {
    echo "<h1>Főoldal</h1><p>Üdvözöllek a portfólió oldalamon!</p>";
});

$router->get('/about', function () {
    echo "<h1>Rólam</h1><p>Tapasztalt szoftverfejlesztő vagyok.</p>";
});

// A kérés továbbítása a Router felé
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);