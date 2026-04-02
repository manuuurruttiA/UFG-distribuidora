<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
// Nota: Aquí luego usaremos un ProductoModel cuando lo crees
// use App\Models\ProductoModel; 

class Admin extends BaseController
{
    // Pantalla principal de administración: Listado de Marcas
    public function index()
    {
        $model = new CategoriaModel();
        $data['categorias'] = $model->findAll();
        return view('admin/marcas', $data);
    }

    // Ver productos de una marca específica para editarlos
    public function editar_productos($categoria_id)
{
    $catModel = new \App\Models\CategoriaModel();
    $prodModel = new \App\Models\ProductoModel();

    $data['categoria'] = $catModel->find($categoria_id);
    // Buscamos productos que pertenezcan a esta marca
    $data['productos'] = $prodModel->where('categoria_id', $categoria_id)->findAll();

    return view('admin/productos_edit', $data);
}

public function guardar_producto()
    {
        $model = new ProductoModel();
        
        // Manejo de la imagen
        $img = $this->request->getFile('foto');
        $nombreImagen = 'default_producto.png';

        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nombreImagen = $img->getRandomName();
            $img->move(FCPATH . 'uploads/productos', $nombreImagen);
        }

        $data = [
            'categoria_id'    => $this->request->getPost('categoria_id'),
            'nombre'          => $this->request->getPost('nombre'),
            'unidad'          => $this->request->getPost('unidad'),
            'precio_compra'   => $this->request->getPost('precio_compra'),
            'margen_ganancia' => $this->request->getPost('margen_ganancia'),
            'imagen'          => $nombreImagen
        ];

        $model->insert($data);
        return redirect()->back();
    }

    // Método para guardar cambios de precios (vía POST)
    public function actualizar_precio()
    {
        $id = $this->request->getPost('id');
        $precio = $this->request->getPost('precio');

        // Aquí iría la lógica para guardar en la base de datos
        // $productoModel->update($id, ['precio' => $precio]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Precio actualizado']);
    }
}