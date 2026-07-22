<?php

declare(strict_types=1);

namespace App\Core;

class App
{
    public function run(): void
    {
        echo "<p>A Composer PSR-4 Autoloader hibátlanul betöltötte az <strong>App</strong> osztályt!</p>";
    }
}