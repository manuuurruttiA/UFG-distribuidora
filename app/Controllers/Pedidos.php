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
    public function productos($cliente_id, $marcaCodificada)
{
    $data['cliente_id'] = $cliente_id;
    
    // Decodificamos el Base64 para recuperar el nombre original (ej: "Grangy´s")
    $marcaOriginal = base64_decode($marcaCodificada);
    $data['marca'] = $marcaOriginal;

    $todosLosProductos = [
        'Grangy´s' => [ // Asegúrate de que la clave coincida exactamente
            ['id' => 301, 'nombre' => 'Medallón de Pollo x4', 'precio' => 2500],
            ['id' => 302, 'nombre' => 'Nuggets Premium 1kg', 'precio' => 4100],
        ],
        'McCain' => [
            ['id' => 101, 'nombre' => 'Papas Tradicionales 2.5kg', 'precio' => 4500],
        ],
        // ... resto de marcas
    ];

    $data['productos'] = $todosLosProductos[$marcaOriginal] ?? [];

    return view('pedidos/productos_marca', $data);
}
}