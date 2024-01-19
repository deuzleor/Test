<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('1', 'Pantalla1::index');

$routes->get('2', 'Pantalla2::index');

$routes->get('3', 'Pantalla3::index');

$routes->get('4', 'Pantalla4::index');