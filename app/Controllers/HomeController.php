<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        $data = [
            'title' => 'Kezdőlap - Portfólió',
            'heading' => 'Üdvözöllek a Portfólió Oldalamon!'
        ];

        extract($data);

        require_once __DIR__ . '/../Views/Home/home.php';
    }

    public function valami(): void
    {
        $data = [
            'title' => 'Kezdőlap/valami - Portfólió',
            'heading' => 'Üdvözöllek a Portfólió Oldalamon!'
        ];

        extract($data);

        require_once __DIR__ . '/../Views/Home/valami.php';
    }

    
}