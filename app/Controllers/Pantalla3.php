<?php

namespace App\Controllers;

class Pantalla3 extends BaseController
{
    public function index(): string
    {
        // Define el contenido específico de Pantalla 3
        $data['content'] = view('Pantalla3');

        // Carga la vista común del menú
        return view('menu', $data);
    }
}