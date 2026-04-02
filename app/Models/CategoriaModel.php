<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table            = 'categorias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'icono', 'color'];
    protected $useTimestamps    = false; // Ya lo maneja el DEFAULT CURRENT_TIMESTAMP de SQL
}