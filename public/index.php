<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Database;
use App\Controllers\HomeController;
use App\Controllers\AboutController;

// Adatbázis-kapcsolat tesztelése
try {
    $db = Database::getConnection();
    // Ha nem dobott kivételt, a kapcsolat sikeresen felépült
} catch (\Throwable $e) {
    echo "DB hiba";
}

$router = new Router();

// Útvonalak regisztrálása teszt eljárásokkal (Closure)
$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);
$router->get('/about', [AboutController::class, 'index']);


// A kérés továbbítása a Router felé
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);