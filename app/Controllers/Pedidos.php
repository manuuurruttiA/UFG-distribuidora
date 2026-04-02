<?php

namespace App\Controllers;

class Pedidos extends BaseController
{
    // Listado de Marcas
    public function nuevo($cliente_id)
    {
        $data['cliente_id'] = $cliente_id;
        $data['marcas'] = [
            ['nombre' => 'Dike', 'color' => 'bg-cyan', 'icon' => '🍖'],
            ['nombre' => 'Grangy´s', 'color' => 'bg-pink', 'icon' => '🍗'],
            ['nombre' => 'Danal', 'color' => 'bg-purple', 'icon' => '🍦'],
            ['nombre' => 'McCain', 'color' => 'bg-orange', 'icon' => '🍟'],
            ['nombre' => 'PATY', 'color' => 'bg-danger', 'icon' => '🍔'],
        ];
        return view('pedidos/nuevo', $data);
    }

    // Vista de Productos por Marca
    public function productos($cliente_id, $marca)
    {
        $data['cliente_id'] = $cliente_id;
        $data['marca'] = urldecode($marca);

        // Simulación de productos (esto vendría de tu DB)
        $todosLosProductos = [
            'McCain' => [
                ['id' => 101, 'nombre' => 'Papas Tradicionales 2.5kg', 'precio' => 4500],
                ['id' => 102, 'nombre' => 'Papas Noisette 1kg', 'precio' => 3200],
            ],
            'PATY' => [
                ['id' => 201, 'nombre' => 'Hamburguesa Clásica x4', 'precio' => 2800],
                ['id' => 202, 'nombre' => 'Paty Large x2', 'precio' => 1900],
            ],
            // Agregar las demás marcas aquí...
        ];

        $data['productos'] = $todosLosProductos[$data['marca']] ?? [];

        return view('pedidos/productos_marca', $data);
    }
}