<?php

namespace App\Controllers;

class Pantalla2 extends BaseController
{
    public function index(): string
    {
        // Define el contenido específico de Pantalla 2
        $data['content'] = view('Pantalla2');

        // Carga la vista común del menú
        return view('menu', $data);
    }
}