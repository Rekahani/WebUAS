<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Warga::index');
$routes->get('/laporan', 'Daftar::laporan');
$routes->get('/warga', 'Home::index');
$routes->get('/daftar', 'Daftar::index');
$routes->get('/daftar/belum', 'Daftar::belum');
$routes->get('/pages/create', 'Home::create');
$routes->delete('/pages/(:num)', 'Home::delete/$1');
$routes->get('pages/(:num)', 'Home::detail/$1');
$routes->post('/pages/save', 'Home::save');
$routes->get('/pages/edit/(:num)', 'Home::edit/$1');
$routes->post('/pages/update/(:num)', 'Home::update/$1');
$routes->get('/pages/kas/(:num)', 'Home::kas/$1');
$routes->post('/pages/uang', 'Home::uang');
$routes->get('/pages/kas', 'Daftar::create');


$routes->get('/daftar/create', 'Daftar::create');
$routes->post('/daftar/save', 'Daftar::save');
$routes->delete('/daftar/(:any)', 'Daftar::delete/$1');

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