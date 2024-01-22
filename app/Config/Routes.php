<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Principal::index');

$routes->get('admin', 'Admin::index');

$routes->match(['get', 'post'], 'admin/nuevo', 'Admin::vistaArticulo');

$routes->post('articulos/nuevoArticulo', 'Articulos::nuevoArticulo');

$routes->get('articulos/listaArticulosPortada', 'Articulos::listaArticulosPortada');

$routes->get('articulo/(:segment)', 'ArticulosDetail::detalle/$1');

$routes->get('articulos/listaArticulos', 'Articulos::listaArticulos');

$routes->delete('articulos/eliminarArticulo/(:num)', 'Articulos::eliminarArticulo/$1');

$routes->post('admin/actualizarArticulo', 'Admin::actualizarArticulo');


