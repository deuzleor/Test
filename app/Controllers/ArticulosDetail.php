<?php

namespace App\Controllers;

use App\Models\ArticuloModel;

class ArticulosDetail extends BaseController
{
    public function detalle($id)
    {
        $modelo = new ArticuloModel();

        $articulo = $modelo->find($id);

        if (!$articulo) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar la página solicitada');
        }

        return view('articulos_detail', ['articulo' => $articulo]);
    }
}
