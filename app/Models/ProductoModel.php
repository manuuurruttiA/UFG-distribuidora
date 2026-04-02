<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    // IMPORTANTE: precio_venta NO va aquí porque es virtual
    protected $allowedFields = [
        'categoria_id', 
        'nombre', 
        'unidad', 
        'precio_compra', 
        'margen_ganancia'
    ];

    protected $returnType = 'array';
}