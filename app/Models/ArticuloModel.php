<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticuloModel extends Model
{
    protected $table = 'articulos'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['title', 'keyword', 'minage', 'maxage', 'portrait', 'thumbnail', 'synthesis', 'created_at'];


}