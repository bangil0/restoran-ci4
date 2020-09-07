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
	$routes->get('dashboard', 'Admin\Login::index');
// $routes->get('kategori/(:any)', 'admin\kategori::selectWhere/$1');

$routes->group('admin', ['filter' => 'Auth'], function ($routes) {
	$routes->add('/', 'Admin\AdminPage::index');
	$routes->add('kategori', 'Admin\Kategori::read');
	$routes->add('kategori/create', 'Admin\Kategori::create');
	$routes->add('kategori/find/(:any)', 'Admin\Kategori::find/$1');
	$routes->add('kategori/delete/(:any)', 'Admin\Kategori::delete/$1');

	$routes->add('menu', 'Admin\Menu::index');
	$routes->add('menu/create', 'Admin\Menu::create');
	$routes->add('menu/find/(:any)', 'Admin\Menu::find/$1');
	$routes->add('menu/delete/(:any)', 'Admin\Menu::delete/$1');

	$routes->add('pelanggan', 'Admin\Pelanggan::index');
	$routes->add('pelanggan/create', 'Admin\Pelanggan::create');
	$routes->add('pelanggan/find/(:any)', 'Admin\Pelanggan::find/$1');
	$routes->add('pelanggan/delete/(:any)', 'Admin\Pelanggan::delete/$1');

	$routes->add('order', 'Admin\Order::index');
	$routes->add('order/find/(:any)', 'Admin\Order::find/$1');

	$routes->add('orderdetail', 'Admin\OrderDetail::index');

	$routes->add('user', 'Admin\User::index');
	$routes->add('user/find/(:any)', 'Admin\User::find/$1');
	$routes->add('user/delete/(:any)', 'Admin\User::delete/$1');
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
