<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\BaseController;

class AboutController extends BaseController
{
    public function index(): void
    {
        $this->render(
            'About', 
            'index', 
            [   "title" => "Rólam - Portfólió", 
                "heading" => "Itt olvashatsz rólam"
            ]
        );
    }
    
}