<?php

namespace App\Controllers;

use App\Models\CategoriaModel; // Importación crucial

class Pedidos extends BaseController
{
    public function nuevo($cliente_id)
    {
        $model = new CategoriaModel();
        
        $data['cliente_id'] = $cliente_id;
        // Cargamos las categorías reales de la base de datos
        $data['categorias'] = $model->findAll(); 
        
        return view('pedidos/nuevo', $data);
    }

    public function guardar_categoria()
    {
        $model = new CategoriaModel();
        
        $cliente_id = $this->request->getPost('cliente_id');
        $nombre = $this->request->getPost('nombre_categoria');

        $data = [
            'nombre' => $nombre,
            'icono'  => '📦', 
            'color'  => 'bg-purple'
        ];

        if ($model->insert($data)) {
            return redirect()->to(base_url('clientes/nuevo_pedido/' . $cliente_id));
        }
    }

    public function productos($cliente_id, $categoriaSlug)
    {
        $data['cliente_id'] = $cliente_id;
        $categoria = base64_decode($categoriaSlug);
        $data['marca'] = $categoria; 

        // Aquí podrías crear un ProductoModel para traer productos reales por categoria_id
        $productosRepo = [
            'Rebozados Pollo' => [
                ['id' => 1, 'nombre' => 'Patitas de Pollo x 3kg', 'precio' => 0],
                ['id' => 2, 'nombre' => 'Medallones de Pollo x 3kg', 'precio' => 0],
            ],
            // ... resto de productos
        ];

        $data['productos'] = $productosRepo[$categoria] ?? [];
        return view('pedidos/productos_marca', $data);
    }
}