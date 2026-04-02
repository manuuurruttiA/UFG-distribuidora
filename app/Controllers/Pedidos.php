<?php

namespace App\Controllers;

class Pedidos extends BaseController
{
    public function nuevo($cliente_id)
    {
        // Simulamos marcas y productos (Luego vendrán de la DB)
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
}