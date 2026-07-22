<?php

namespace App\Core;
// Teszt comment
class Router 
{
    protected array $routes = [];

    public function get(string $uri, string $controllerAction): void
    {
        $uri = trim($uri, '/');
        $this->routes['GET'][$uri] = $controllerAction;
    }

    public function resolve(string $uri, string $method)
    {
        $uri = trim($uri, '/');
        
        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            
            // Szétválasztjuk az osztálynevet és a metódust a '@' jel mentén (pl. 'AboutController@index')
            [$controllerName, $methodName] = explode('@', $action);
            
            // Hozzáfűzzük a teljes névteret (App\Controllers\AboutController)
            $fullControllerClass = "App\\Controllers\\" . $controllerName;

            // Ellenőrizzük, hogy létezik-e az osztály
            if (class_exists($fullControllerClass)) {
                $controllerInstance = new $fullControllerClass();

                // Ellenőrizzük, hogy létezik-e a metódus az osztályban
                if (method_exists($controllerInstance, $methodName)) {
                    // Meghívjuk a metódust!
                    return $controllerInstance->$methodName();
                }
            }
        }

        http_response_code(404);
        echo "404 - Az oldal nem található!";
        exit;
    }
}