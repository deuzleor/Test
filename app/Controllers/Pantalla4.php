<?php

namespace App\Controllers;

class Pantalla4 extends BaseController
{
    public function index(): string
    {
        // Define el contenido específico de Pantalla 4
        $data['content'] = view('Pantalla4');

        // Carga la vista común del menú
        return view('menu', $data);
    }
}