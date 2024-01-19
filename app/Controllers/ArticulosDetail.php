<?php

namespace App\Controllers;

class ArticulosDetail extends BaseController
{
    public function index(): string
    {
        return view('articulos_detail');
    }
}
