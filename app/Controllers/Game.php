<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Game extends BaseController
{
    public function index(): string
    {
        return view('game');
    }
}
