<?php

namespace App\Core;

class Router
{
    /**
     * @var array<string, array<string, callable|array>>
     */
    private array $routes = [];

    /**
     * GET típusú útvonal regisztrálása
     */
    public function get(string $path, callable|array $handler): void
    {
        $this->routes['GET'][$this->normalizePath($path)] = $handler;
    }

    /**
     * POST típusú útvonal regisztrálása (pl. űrlapokhoz)
     */
    public function post(string $path, callable|array $handler): void
    {
        $this->routes['POST'][$this->normalizePath($path)] = $handler;
    }

    /**
     * A beérkező kérés feldolgozása és a megfelelő logika meghívása
     */
    public function dispatch(string $uri, string $method): void
    {
        $path = $this->normalizePath(parse_url($uri, PHP_URL_PATH) ?? '/');
        $method = strtoupper($method);

        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];

            // Ha anonymous függvényt (Closure) adtunk meg útvonalnak
            if (is_callable($handler)) {
                call_user_func($handler);
                return;
            }
        }

        // Ha az útvonal nem található
        http_response_code(404);
        echo "<h1>404 - Az oldal nem található</h1>";
    }

    /**
     * Az útvonal tisztítása (kezdő és záró perjelek kezelése)
     */
    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        return '/' . $path;
    }
}