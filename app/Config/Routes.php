<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('index', 'Main::index');
$routes->get('soupisEtap/(:num)', 'Main::soupisEtap/$1');
$routes->get('etapa/(:num)', 'Main::etapa/$1');

$routes->get('formular/zmenaVFormulari/(:num)', 'Formular::zmenaVFormulari/$1');
$routes->post('formular/zmena', 'Formular::zmena');


