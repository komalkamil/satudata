<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/backend/logsdata/(:num)', 'Backend\Logsdata::index/$1');

$routes->delete('/backend/masterformatdatas/(:num)', 'Backend\Masterformatdatas::delete/$1');
$routes->delete('/backend/masterjenisdatas/(:num)', 'Backend\Masterjenisdatas::delete/$1');
$routes->delete('/backend/masterstatus/(:num)', 'Backend\Masterstatus::delete/$1');
$routes->delete('/backend/masterpusats/(:num)', 'Backend\Masterpusats::delete/$1');
$routes->delete('/backend/masterdisagregasis/(:num)', 'Backend\Masterdisagregasis::delete/$1');

$routes->get('/backend', 'Backend\Dashboard::index');
$routes->group('register', function ($routes) {
    $routes->get('/', 'RegisterController::index');
    $routes->post('/', 'RegisterController::store');
});

$routes->group('login', function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->post('/', 'Auth::login');
});


$routes->setAutoRoute(true);
