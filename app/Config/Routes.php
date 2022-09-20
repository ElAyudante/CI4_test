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
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
//$routes->set404Override($errors);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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

$routes->get('users', 'users::index');
$routes->get('users/(:any)/edit', 'users::edit/$1');
$routes->get('users/(:any)/delete', 'users::delete/$1');
$routes->get('users/login', 'users::login');
$routes->get('users/admin/login', 'admin::login');
$routes->get('users/register', 'users::register');
$routes->get('users/logout', 'users::logout');
$routes->get('users/profile/edit', 'users::edit');
$routes->get('create_forum', 'forum::create_forum');
$routes->get('topic/create', 'forum::create_topic');
$routes->get('(:any)/create_topic', 'forum::create_topic/$1');
$routes->get('topic/(:any)/(:any)', 'forum::topic/$1/$2');
$routes->get('(:any)/(:any)/reply', 'forum::create_post/$1/$2');
$routes->get('itemCRUD/print', "itemCRUD::create");
$routes->get('itemCRUD', "itemCRUD::lista_colegiados");
$routes->get('itemCRUD/(:num)', "itemCRUD");
$routes->get('itemCRUDShow/(:any)', "itemCRUD::show/$1");
$routes->get('itemCRUD/create', "itemCRUD::create");
$routes->get('itemCRUD/edit/(:any)', "itemCRUD::edit/$1");
$routes->get('itemCRUDUpdate/(:any)', "itemCRUD::update/$1");
$routes->get('itemCRUDDelete/(:any)', "itemCRUD::delete/$1");
$routes->get('documentos', 'itemCRUD::listar_documentos');
$routes->get('paypal/success/(:any)', 'paypal::success/$1');
$routes->get('(:any)', 'pages::view/$1');
