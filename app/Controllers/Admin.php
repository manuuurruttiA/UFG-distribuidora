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
        $model = new CategoriaModel();
        $categoria = $model->find($categoria_id);

        if (!$categoria) {
            return redirect()->to(base_url('admin'))->with('error', 'Marca no encontrada');
        }

        $data['categoria'] = $categoria;
        
        // Por ahora usamos datos fijos, luego será: $productoModel->where('categoria_id', $categoria_id)->findAll();
        $data['productos'] = [
            ['id' => 1, 'nombre' => 'Ejemplo Producto A', 'precio' => 1500],
            ['id' => 2, 'nombre' => 'Ejemplo Producto B', 'precio' => 2000],
        ];

        return view('admin/productos_edit', $data);
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