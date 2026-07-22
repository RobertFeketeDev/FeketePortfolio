<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\BaseController;

class HomeController extends BaseController
{
    public function index(): void
    {
        $this->render(
            'home', 
            'home', 
            [   "title" => "Kezdőlap - Portfólió", 
                "heading" => "Üdvözöllek a Portfólió Oldalamon!"
            ]
        );
    }
    
}