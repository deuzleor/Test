<?php

namespace App\Controllers;

use App\Models\ArticuloModel;
use CodeIgniter\HTTP\Response;

class Articulos extends BaseController
{
    public function nuevoArticulo()
    {
        $model = new ArticuloModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'keyword' => $this->request->getPost('keyword'),
            'minage' => $this->request->getPost('minage'),
            'maxage' => $this->request->getPost('maxage'),
            'synthesis' => $this->request->getPost('synthesis'),
            'content' => $this->request->getPost('content'),
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

    public function listaArticulosPortada()
    {
        $model = new ArticuloModel();
        $articulos = $model->orderBy('created_at', 'DESC')->findAll(6);

        return $this->response->setJSON($articulos);
    }
    
    public function listaArticulos()
    {
        $model = new ArticuloModel();
        $articulos = $model->orderBy('created_at', 'DESC')->findAll();

        return $this->response->setJSON($articulos);
    } 

    public function eliminarArticulo($id)
    {
        $model = new ArticuloModel();

        // Obtén la información del artículo antes de eliminarlo
        $articulo = $model->find($id);

        if ($articulo) {
            // Elimina los archivos asociados
            unlink(FCPATH . 'uploads/' . $articulo['portrait']);
            unlink(FCPATH . 'uploads/' . $articulo['thumbnail']);

            // Elimina el artículo de la base de datos
            $model->delete($id);

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Artículo no encontrado']);
    }


    public function editarArtociculo($id)
    {
        $model = new ArticuloModel();

        $data['articulo'] = $model->find($id);

        return view('admin/editar', $data);
    }

    public function actualizarArticulo($id)
    {

    $model = new ArticuloModel();

    $data = [
        'title' => $this->request->getPost('title'),
        'keyword' => $this->request->getPost('keyword'),
        'minage' => $this->request->getPost('minage'),
        'maxage' => $this->request->getPost('maxage'),
        'synthesis' => $this->request->getPost('synthesis'),
        'content' => $this->request->getPost('content'),
        'created_at' => date('Y-m-d H:i:s'),
    ];

    // Procesar archivos de imagen
    $Portrait = $this->request->getFile('portrait');
    $Thumbnail = $this->request->getFile('thumbnail');

    // Verificar si se han subido nuevas imágenes
    if ($Portrait->isValid() && $Thumbnail->isValid()) {

        // Generar nuevos nombres de archivos con el ID del artículo
        $nombrePortrait = 'Portada_Articulo_' . $id . '.' . $Portrait->getExtension();
        $nombreThumbnail = 'Thumbnail_Articulo_' . $id . '.' . $Thumbnail->getExtension();

        // Mover archivos a la carpeta adecuada
        $Portrait->move('./uploads/', $nombrePortrait);
        $Thumbnail->move('./uploads/', $nombreThumbnail);

        // Actualizar los nombres de archivo en la base de datos
        $data['portrait'] = $nombrePortrait;
        $data['thumbnail'] = $nombreThumbnail;

    }

    // Actualizar el artículo en la base de datos
    $model->update($id, $data);

    return redirect()->to('/');

    }

}


