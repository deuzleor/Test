<?php

namespace App\Controllers;

use App\Models\ArticuloModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function vistaArticulo()
    {
        return view('admin/nuevo');
    }
}
