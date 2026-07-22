<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\BaseController;

class HomeController extends BaseController
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


    
}