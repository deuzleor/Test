<?php

namespace App\Controllers;

use App\Models\ArticuloModel;
use CodeIgniter\HTTP\Response;

class Articulos extends BaseController
{
    public function getUltimosArticulos()
    {
        $model = new ArticuloModel();
        $articulos = $model->orderBy('created_at', 'DESC')->findAll(6);

        return $this->response->setJSON($articulos);
    }
    
    public function getArticulosList()
    {
        $model = new ArticuloModel();
        $articulos = $model->orderBy('created_at', 'DESC')->findAll();

        return $this->response->setJSON($articulos);
    }
}

