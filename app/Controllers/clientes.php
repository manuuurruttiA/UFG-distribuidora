<?php

namespace App\Controllers;

class Clientes extends BaseController
{
    public function index()
    {
        // Datos de ejemplo (Luego los traerás de la DB con un Model)
        $data['clientes'] = [
            ['id' => 1, 'nombre' => 'Almacén de Juan', 'direccion' => 'Calle Falsa 123', 'deuda' => 1500],
            ['id' => 2, 'nombre' => 'Distribuidora Sol', 'direccion' => 'Av. Principal 456', 'deuda' => 0],
            ['id' => 3, 'nombre' => 'Kiosco El Paso', 'direccion' => 'Ruta 9 Km 20', 'deuda' => 5400],
        ];

        return view('clientes/listado', $data);
    }

    public function historial_pedidos($id) { /* Lógica futura */ }
    public function historial_cuenta($id) { /* Lógica futura */ }
    public function nuevo_pedido($id) { /* Lógica futura */ }
}