<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Principal::index');

$routes->get('admin', 'Admin::index');

$routes->match(['get', 'post'], 'admin/nuevo', 'Admin::createArticle');

$routes->post('/', 'Admin::saveArticle');

$routes->get('articulos/listaArticulosPortada', 'Articulos::getUltimosArticulos');

$routes->get('articulo/(:segment)', 'ArticulosDetail::detalle/$1');

$routes->get('articulos/listaArticulos', 'Articulos::getArticulosList');
