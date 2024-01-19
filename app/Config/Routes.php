<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Articulos::index');

$routes->get('articulo', 'ArticulosDetail::index');

$routes->get('admin', 'Admin::index');

$routes->match(['get', 'post'], 'admin/nuevo', 'Admin::createArticle');