<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'VehicleController::index');


$routes->group('customer', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'CustomerController::index');
    $routes->get('create', 'CustomerController::create');
    $routes->post('store', 'CustomerController::store');
    $routes->get('edit/(:num)', 'CustomerController::edit/$1');
    $routes->post('update/(:num)', 'CustomerController::update/$1');
});

$routes->group('sales', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'SalesController::index');
    $routes->get('create', 'SalesController::create');
    $routes->post('store', 'SalesController::store');
    $routes->get('edit/(:num)', 'SalesController::edit/$1');
    $routes->post('update/(:num)', 'SalesController::update/$1');
    $routes->get('delete/(:num)', 'SalesController::delete/$1');
});

$routes->group('transaction', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'TransactionController::index');
    $routes->get('create', 'TransactionController::create');
    $routes->post('store', 'TransactionController::store');
    $routes->get('transaction/report', 'TransactionController::report');
    $routes->get('edit/(:num)', 'TransactionController::edit/$1');
    $routes->post('update/(:num)', 'TransactionController::update/$1');
    $routes->get('delete/(:num)', 'TransactionController::delete/$1');
});

$routes->get('/vehicle', 'VehicleController::index');
$routes->get('/vehicle/create', 'VehicleController::create');
$routes->post('/vehicle/store', 'VehicleController::store');
$routes->get('/vehicle/edit/(:num)', 'VehicleController::edit/$1');
$routes->post('/vehicle/update/(:num)', 'VehicleController::update/$1');
$routes->get('/vehicle/delete/(:num)', 'VehicleController::delete/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
