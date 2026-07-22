<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;

$router = new Router();

// Útvonalak regisztrálása teszt eljárásokkal (Closure)
$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);


// A kérés továbbítása a Router felé
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);