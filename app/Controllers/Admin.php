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
            'synthesis' => $this->request->getPost('synthesis'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Procesar archivos de imagen

        $Portrait = $this->request->getFile('portrait');
        $Thumbnail = $this->request->getFile('thumbnail');

        // Obtener el ID del artículo después de insertarlo en la base de datos

        $lastInsertedId = $model->insert($data);

        // Generar nuevos nombres de archivos con el ID del artículo

        $nombrePortrait = 'Portada_Articulo_' . $lastInsertedId . '.' . $Portrait->getExtension();
        $nombreThumbnail = 'Thumbnail_Articulo_' . $lastInsertedId . '.' . $Thumbnail->getExtension();

        // Mover archivos a la carpeta adecuada (ajusta la ruta según tu configuración)

        $Portrait->move('./uploads/', $nombrePortrait);
        $Thumbnail->move('./uploads/', $nombreThumbnail);

        // Actualizar los nombres de archivo en la base de datos

        $model->update($lastInsertedId, ['portrait' => $nombrePortrait, 'thumbnail' => $nombreThumbnail]);

        return redirect()->to("/articulo/{$lastInsertedId}");
        }
}
