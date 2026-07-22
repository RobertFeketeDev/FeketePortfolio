<?php

declare(strict_types=1);

namespace App\Core;

abstract class BaseController
{
    /**
     * Nézet renderelése közös Layout használatával
     *
     * @param string $controller A nézet file controllere (pl. 'home')
     * @param string $view A nézet fájl neve (pl. 'home')
     * @param array<string, mixed> $data A nézetnek átadandó adatok
     */
    protected function render(string $controller, string $view, array $data = []): void
    {
        $viewFile = __DIR__ . '/../Views/' . $controller . '/' . $view . '.php';

        if(!file_exists($viewFile))
        {
            http_response_code(500);
            echo "<h1>500 - Szerver hiba</h1><p>A kért nézetfájl nem található: <strong>{$view}</strong></p>";
            return;
        }

        extract($data);

        require_once __DIR__ . '/../Views/layout.php';
    }
}