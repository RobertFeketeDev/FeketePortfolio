<?php

// Behúzzuk a saját autoloaderünket
require_once __DIR__ . '/../core/Autoloader.php';

// Regisztráljuk az autoloadert
\App\Core\Autoloader::register();

use App\Core\Router;

$router = new Router();

// Regisztráljuk az útvonalakat
$router->get('', 'HomeController@index');
$router->get('rolam', 'AboutController@index');
$router->get('kapcsolat', 'ContactController@index');

$uri = $_GET['url'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

$eredmeny = $router->resolve($uri, $method);

echo "Sikeres egyezés! A hozzárendelt controller: " . $eredmeny;