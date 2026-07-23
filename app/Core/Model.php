<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

abstract class BaseModel
{
    /**
     * Az adatbázis-kapcsolatot tároló PDO példány
     */
    protected PDO $db;

    public function __construct()
    {
        // Az egyetlen közös PDO kapcsolatot kérjük el a Singleton osztályunktól
        $this->db = Database::getConnection();
    }
}