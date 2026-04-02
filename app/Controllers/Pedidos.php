<?php

namespace App\Controllers;
use App\Models\CategoriaModel;

class Pedidos extends BaseController
{
    public function nuevo($cliente_id)
    {
        $data['cliente_id'] = $cliente_id;
        // Categorías basadas en tus listas de productos
        $data['categorias'] = [
            ['nombre' => 'Rebozados Pollo', 'color' => 'bg-cyan', 'icon' => '🍗'],
            ['nombre' => 'Rebozados Carne', 'color' => 'bg-pink', 'icon' => '🥩'],
            ['nombre' => 'Vegetales', 'color' => 'bg-purple', 'icon' => '🥦'],
            ['nombre' => 'Hamburguesas', 'color' => 'bg-danger', 'icon' => '🍔'],
            ['nombre' => 'Papas Fritas', 'color' => 'bg-orange', 'icon' => '🍟'],
        ];
        return view('pedidos/nuevo', $data);
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
                ['id' => 3, 'nombre' => 'Formitas de Pollo x 3kg', 'precio' => 0],
                ['id' => 4, 'nombre' => 'Nuggets de Pollo x 3kg', 'precio' => 0],
            ],
            'Rebozados Carne' => [
                ['id' => 5, 'nombre' => 'Medallones de Carne x 3kg', 'precio' => 0],
                ['id' => 6, 'nombre' => 'Medallones de Jamón y Queso x 3kg', 'precio' => 0],
            ],
            'Vegetales' => [
                ['id' => 7, 'nombre' => 'Espinaca picada x 2.5kg', 'precio' => 0],
                ['id' => 8, 'nombre' => 'Choclo desgranado x 2.5kg', 'precio' => 0],
                ['id' => 9, 'nombre' => 'Mezcla Primavera x 2.5kg', 'precio' => 0],
                ['id' => 10, 'nombre' => 'Brócoli x 2.5kg', 'precio' => 0],
            ],
            'Hamburguesas' => [
                ['id' => 11, 'nombre' => 'Paty Tradicional x 12 u.', 'precio' => 0],
                ['id' => 12, 'nombre' => 'Paty Finitos x 30 u.', 'precio' => 0],
                ['id' => 13, 'nombre' => 'Paty Gigante x 12 u.', 'precio' => 0],
            ],
            'Papas Fritas' => [
                ['id' => 14, 'nombre' => 'McCain Tradicional 9mm x 2.5kg', 'precio' => 0],
                ['id' => 15, 'nombre' => 'McCain Corte Fino 7mm x 2.5kg', 'precio' => 0],
                ['id' => 16, 'nombre' => 'McCain Noisettes x 2.5kg', 'precio' => 0],
            ],
        ];

        $data['productos'] = $productosRepo[$categoria] ?? [];
        return view('pedidos/productos_marca', $data);
    }
    public function guardar_categoria()
{
    $model = new \App\Models\CategoriaModel();
    
    $cliente_id = $this->request->getPost('cliente_id');
    $nombre = $this->request->getPost('nombre_categoria');

    // Datos a insertar
    $data = [
        'nombre' => $nombre,
        'icono'  => '📦', // Icono por defecto para nuevas categorías
        'color'  => 'bg-purple'
    ];

    if ($model->insert($data)) {
        // Volvemos a la pantalla de selección de categorías del cliente actual
        return redirect()->to(base_url('clientes/nuevo_pedido/' . $cliente_id));
    } else {
        // Si hay error, podrías manejarlo aquí
        return "Error al guardar la categoría";
    }
}
}