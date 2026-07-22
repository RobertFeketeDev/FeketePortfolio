<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        echo "<h1>Üdvözöllek a HomeController-ből!</h1>";
        echo "<p>Ez a válasz már egy tiszta Controller osztályból érkezik.</p>";
    }

    public function szia(): void
    {
        echo "<h1>Üdvözöllek a HomeController::szia-ből!</h1>";
        echo "<p>Ez a válasz már egy tiszta Controller osztály szia funkciójából érkezik.</p>";
    }
}