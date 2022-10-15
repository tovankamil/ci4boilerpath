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
$routes->get('/', 'Home::index');
$routes->get('/berita', 'Berita::index');
$routes->get('/kategori/(:any)', 'Kategori::index/$1');
$routes->get('/berita/detail/(:any)', 'Berita::detail/$1');


$routes->get('/loginadmin', 'Admin_login::index');
$routes->post('/loginadmin/auth', 'Admin_login::auth');
$routes->get('/loginadmin/logout', 'Admin_login::logout');

// Admin
$routes->get('/dashboard', 'Admin_dashboard::index', ['filter' => 'adminotentikasi']);

#Berita
$routes->get('/adminpost', 'Admin_post::index', ['filter' => 'adminotentikasi']);
$routes->get('/adminberita', 'Admin_berita::index', ['filter' => 'adminotentikasi']);
$routes->post('/adminberita/input', 'Admin_berita::input', ['filter' => 'adminotentikasi']);
$routes->get('/adminberita/update/(:num)', 'Admin_berita::update/$1', ['filter' => 'adminotentikasi']);
$routes->post('/adminberita/updateberita', 'Admin_berita::updateberita', ['filter' => 'adminotentikasi']);
$routes->get('/adminberita/delete/(:num)', 'Admin_berita::delete/$1', ['filter' => 'adminotentikasi']);


#Upload Images

$routes->get('/adminimages', 'Admin_images::index', ['filter' => 'adminotentikasi']);
$routes->post('/adminimages/input', 'Admin_images::input', ['filter' => 'adminotentikasi']);
$routes->get('/adminimages/update/(:num)', 'Admin_images::update/$1', ['filter' => 'adminotentikasi']);
$routes->post('/adminimages/updateimage', 'Admin_images::updateimages', ['filter' => 'adminotentikasi']);
$routes->get('/adminimages/delete/(:num)', 'Admin_images::delete/$1', ['filter' => 'adminotentikasi']);

#Upload Youtube

$routes->get('/adminyoutube', 'Admin_youtube::index', ['filter' => 'adminotentikasi']);
$routes->post('/adminyoutube/input', 'Admin_youtube::input', ['filter' => 'adminotentikasi']);
$routes->get('/adminyoutube/update/(:num)', 'Admin_youtube::update/$1', ['filter' => 'adminotentikasi']);
$routes->post('/adminyoutube/updateyoutube', 'Admin_youtube::updateyoutube', ['filter' => 'adminotentikasi']);
$routes->get('/adminyoutube/delete/(:num)', 'Admin_youtube::delete/$1', ['filter' => 'adminotentikasi']);

// edit profile
$routes->get('/editprofile', 'Admin_editprofile::index', ['filter' => 'adminotentikasi']);
$routes->post('/editprofile/updateData', 'Admin_editprofile::updatedata', ['filter' => 'adminotentikasi']);




$routes->get('/loginadmin/logout', 'Admin_login::logout', ['filter' => 'auth']);



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
