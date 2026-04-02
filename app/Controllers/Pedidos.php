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
    
    $img = $this->request->getFile('foto_categoria');
    $nombreImagen = 'default_marca.png';

    if ($img && $img->isValid() && !$img->hasMoved()) {
        $nombreImagen = $img->getRandomName();
        $img->move(FCPATH . 'uploads/marcas', $nombreImagen);
    }

    $data = [
        'nombre' => $this->request->getPost('nombre_categoria'),
        'imagen' => $nombreImagen,
        'icono'  => '📦', 
        'color'  => 'bg-purple'
    ];

    $model->insert($data);
    
    if ($cliente_id == "0") {
        return redirect()->to(base_url('admin'));
    }
    return redirect()->to(base_url('clientes/nuevo_pedido/' . $cliente_id));
}

    public function productos($cliente_id, $categoria_id_encoded)
{
    // 1. Decodificamos el ID de la categoría (antes usabas el nombre, ahora usamos el ID por seguridad)
    $categoria_id = base64_decode($categoria_id_encoded);
    
    $catModel = new \App\Models\CategoriaModel();
    $prodModel = new \App\Models\ProductoModel();

    // 2. Buscamos la categoría para mostrar el nombre en la vista
    $categoria = $catModel->find($categoria_id);
    
    if (!$categoria) {
        return redirect()->to(base_url('clientes/nuevo_pedido/' . $cliente_id));
    }

    $data['cliente_id'] = $cliente_id;
    $data['marca'] = $categoria['nombre']; 

    // 3. CONSULTA REAL: Traemos los productos de la DB que pertenecen a esta categoría
    $data['productos'] = $prodModel->where('categoria_id', $categoria_id)->findAll();

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