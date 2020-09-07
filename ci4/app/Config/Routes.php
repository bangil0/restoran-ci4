<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
	$routes->get('dashboard', 'admin\Login::index');
// $routes->get('kategori/(:any)', 'admin\kategori::selectWhere/$1');

$routes->group('admin', ['filter' => 'Auth'], function ($routes) {
	$routes->add('/', 'admin\adminpage::index');
	$routes->add('kategori', 'admin\kategori::read');
	$routes->add('kategori/create', 'admin\kategori::create');
	$routes->add('kategori/find/(:any)', 'admin\kategori::find/$1');
	$routes->add('kategori/delete/(:any)', 'admin\kategori::delete/$1');

	$routes->add('menu', 'admin\menu::index');
	$routes->add('menu/create', 'admin\menu::create');
	$routes->add('menu/find/(:any)', 'admin\menu::find/$1');
	$routes->add('menu/delete/(:any)', 'admin\menu::delete/$1');

	$routes->add('pelanggan', 'admin\pelanggan::index');
	$routes->add('pelanggan/create', 'admin\pelanggan::create');
	$routes->add('pelanggan/find/(:any)', 'admin\pelanggan::find/$1');
	$routes->add('pelanggan/delete/(:any)', 'admin\pelanggan::delete/$1');

	$routes->add('order', 'admin\order::index');
	$routes->add('order/find/(:any)', 'admin\order::find/$1');

	$routes->add('orderdetail', 'admin\orderdetail::index');

	$routes->add('user', 'admin\user::index');
	$routes->add('user/find/(:any)', 'admin\user::find/$1');
	$routes->add('user/delete/(:any)', 'admin\user::delete/$1');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
