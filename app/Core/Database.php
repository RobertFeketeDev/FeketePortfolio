<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $driver = $_ENV['DB_DRIVER'] ?? 'pgsql'; // Alapértelmezetten pgsql
            $host   = $_ENV['DB_HOST'] ?? 'localhost';
            $port   = $_ENV['DB_PORT'] ?? '5432';
            $db     = $_ENV['DB_DATABASE'] ?? 'portfolio';
            $user   = $_ENV['DB_USERNAME'] ?? 'postgres';
            $pass   = $_ENV['DB_PASSWORD'] ?? '';

            // DSN összeállítása a driver alapján
            $dsn = "{$driver}:host={$host};port={$port};dbname={$db}";

            // PostgreSQL esetén a charset-et a DSN-ben vagy külön opcióként állítjuk
            if ($driver === 'mysql') {
                $dsn .= ";charset=utf8mb4";
            }

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                http_response_code(500);
                echo "<h1>500 - Adatbázis csatlakozási hiba</h1>";
                error_log($e->getMessage());
                exit;
            }
        }

        return self::$instance;
    }
}