<?php

namespace App\Controllers;

class Articulos extends BaseController
{
    public function index(): string
    {
        return view('articulos');
    }
}
