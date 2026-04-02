<?php

namespace App\Controllers;

use App\Models\CategoriaModel;

class Pedidos extends BaseController
{
    public function nuevo($cliente_id)
    {
        $model = new CategoriaModel();
        
        $data['cliente_id'] = $cliente_id;
        $data['categorias'] = $model->findAll(); 
        
        return view('pedidos/nuevo', $data);
    }

    public function guardar_categoria()
{
    $model = new \App\Models\CategoriaModel();
    
    $cliente_id = $this->request->getPost('cliente_id');
    $nombre = $this->request->getPost('nombre_categoria');

    $data = [
        'nombre' => $nombre,
        'icono'  => '📦', 
        'color'  => 'bg-purple'
    ];

    if ($model->insert($data)) {
        // SI EL CLIENTE ES 0, VOLVEMOS AL ADMIN
        if ($cliente_id == "0") {
            return redirect()->to(base_url('admin'));
        }
        
        // SI NO, VOLVEMOS A LA VISTA DE PEDIDOS DEL CLIENTE
        return redirect()->to(base_url('clientes/nuevo_pedido/' . $cliente_id));
    }
}

    public function productos($cliente_id, $categoriaSlug)
    {
        $data['cliente_id'] = $cliente_id;
        $categoria = base64_decode($categoriaSlug);
        $data['marca'] = $categoria; 

        $productosRepo = [
            'Rebozados Pollo' => [
                ['id' => 1, 'nombre' => 'Patitas de Pollo x 3kg', 'precio' => 0],
                ['id' => 2, 'nombre' => 'Medallones de Pollo x 3kg', 'precio' => 0],
            ],
            'Rebozados Carne' => [
                ['id' => 5, 'nombre' => 'Medallones de Carne x 3kg', 'precio' => 0],
            ],
            'Vegetales' => [
                ['id' => 7, 'nombre' => 'Espinaca picada x 2.5kg', 'precio' => 0],
            ],
            'Hamburguesas' => [
                ['id' => 11, 'nombre' => 'Paty Tradicional x 12 u.', 'precio' => 0],
            ],
            'Papas Fritas' => [
                ['id' => 14, 'nombre' => 'McCain Tradicional 9mm x 2.5kg', 'precio' => 0],
            ],
        ];

        $data['productos'] = $productosRepo[$categoria] ?? [];
        return view('pedidos/productos_marca', $data);
    }

    public function borrar_categoria($id, $cliente_id)
{
    $model = new \App\Models\CategoriaModel();
    $model->delete($id);

    if ($cliente_id == "0") {
        return redirect()->to(base_url('admin'));
    }

    return redirect()->to(base_url('clientes/nuevo_pedido/' . $cliente_id));
}
}