<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ArticuloModel;

class Admin extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function createArticle()
    {
        return view('admin/nuevo');
    }

    public function saveArticle()
    {
        $model = new ArticuloModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'keyword' => $this->request->getPost('keyword'),
            'minage' => $this->request->getPost('minage'),
            'maxage' => $this->request->getPost('maxage'),
            'portrait' => $this->request->getPost('portrait'),
            'thumbnail' => $this->request->getPost('thumbnail'),
            'synthesis' => $this->request->getPost('synthesis'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return redirect()->to('/');
    }
}
