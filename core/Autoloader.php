<?php

namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function (string $class) {
            // Prefix, amit le akarunk cserélni (App\)
            $prefix = 'App\\';
            $baseDir = __DIR__ . '/../';

            // Ellenőrizzük, hogy az osztály a mi névtér-prefixünkkel kezdődik-e
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                return;
            }

            // Kinyerjük a relatív osztálynevet (pl. Core\Router)
            $relativeClass = substr($class, $len);

            // A névterekben lévő \ jeleket átalakítjuk fájlrendszer könyvtárelválasztóvá (/)
            // Pl. App\Core\Router -> core/Router.php
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            // Átalakítjuk az elérést úgy, hogy a mappa kisbetűs legyen, ha kell
            // Mivel a struktúránk: core/Router.php vagy app/Controllers/...
            if (file_exists($file)) {
                require $file;
            } else {
                // Megpróbáljuk csupa kisbetűs mappával is (pl. App\Core\Router -> core/Router.php)
                $firstSlash = strpos($relativeClass, '\\');
                if ($firstSlash !== false) {
                    $folder = strtolower(substr($relativeClass, 0, $firstSlash));
                    $rest = substr($relativeClass, $firstSlash);
                    $alternativeFile = $baseDir . $folder . str_replace('\\', '/', $rest) . '.php';
                    
                    if (file_exists($alternativeFile)) {
                        require $alternativeFile;
                    }
                }
            }
        });
    }
}