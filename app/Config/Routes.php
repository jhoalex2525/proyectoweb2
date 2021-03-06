<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/productos/registro', 'Productos::index');
$routes->post('/productos/registro/nuevo', 'Productos::registrar');
$routes->get('/productos/listado', 'Productos::buscar');
$routes->delete('/productos/eliminar/(:num)', 'Productos::eliminar/$1'); //el $1 es un parametro numerico que va a recibir
$routes->post('/productos/edit/(:num)', 'Productos::editar/$1'); //el $1 es un parametro numerico que va a recibir. Productos::editar/$1 es del controlador productos la funcion editar
$routes->get('/mascotas/registro', 'Mascotas::index');
$routes->post('/mascotas/registro/nuevo', 'Mascotas::registrar');
$routes->get('/mascotas/listado', 'Mascotas::buscar');
$routes->delete('/mascotas/eliminar/(:num)', 'Mascotas::eliminar/$1'); //el $1 es un parametro numerico que va a recibir
$routes->post('/mascotas/edit/(:num)', 'Mascotas::editar/$1'); //el $1 es un parametro numerico que va a recibir. Productos::editar/$1 es del controlador productos la funcion editar

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
