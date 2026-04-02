<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Debajo de $routes->get('/', 'Home::index');
$routes->get('clientes', 'Clientes::index');
$routes->get('clientes/historial_pedidos/(:num)', 'Clientes::historial_pedidos/$1');
$routes->get('clientes/historial_cuenta/(:num)', 'Clientes::historial_cuenta/$1');

$routes->get('pedidos/productos/(:num)/(:any)', 'Pedidos::productos/$1/$2');
$routes->get('clientes/nuevo_pedido/(:num)', 'Pedidos::nuevo/$1');
$routes->post('admin/marcas', 'Pedidos::guardar_categoria');
$routes->get('pedidos/borrar_categoria/(:num)/(:num)', 'Pedidos::borrar_categoria/$1/$2');
// Rutas de Administración
$routes->get('admin', 'Admin::index');
$routes->get('admin/editar_productos/(:num)', 'Admin::editar_productos/$1');
$routes->post('admin/actualizar_precio', 'Admin::actualizar_precio');
// Rutas de Administración de Catálogo
$routes->get('admin', 'Admin::index');
$routes->get('admin/productos/(:num)', 'Admin::ver_productos/$1');
$routes->post('admin/guardar_producto', 'Admin::guardar_producto');
$routes->post('admin/actualizar_precio', 'Admin::actualizar_precio');