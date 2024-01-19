<?php

namespace App\Controllers;

class Pantalla1 extends BaseController
{
    public function index(): string
    {
        // Define el contenido específico de Pantalla 1
        $data['content'] = view('Pantalla1');

        // Carga la vista común del menú
        return view('menu', $data);
    }
}