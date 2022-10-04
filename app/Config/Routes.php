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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'c_home::display');
$routes->get('/mahasiswa', 'c_mahasiswa::display', ['as' => 'mahasiswa']);
$routes->post('/mahasiswa/store', 'c_mahasiswa::store');
$routes->get('/mahasiswa/input', 'c_mahasiswa::input');
$routes->get('/mahasiswa/detail/(:num)', 'c_mahasiswa::detail/$1');
$routes->get('/mahasiswa/delete/(:num)', 'c_mahasiswa::delete/$1');
$routes->post('/mahasiswa', 'c_mahasiswa::display', ['as' => 'mahasiswa.search']);
$routes->get('/mahasiswa/edit/(:num)', 'c_mahasiswa::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'c_mahasiswa::update/$1');

$routes->get('/login', 'c_login::index');
$routes->post('/login/process', 'c_login::process');
$routes->get('/logout', 'c_login::logout');
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
