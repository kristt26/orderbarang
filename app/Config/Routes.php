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
$routes->setDefaultController('Auth');
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

$routes->get('home', 'Home::index');
$routes->group('/', function ($routes) {
    $routes->get('', 'Auth::index');
    $routes->post('login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});
$routes->group('supplier', function ($routes) {
    $routes->get('/', 'Admin\Supplier::index');
    $routes->get('read', 'Admin\Supplier::read');
    $routes->post('post', 'Admin\Supplier::post');
    $routes->put('put', 'Admin\Supplier::put');
    $routes->delete('delete/(:any)', 'Admin\Supplier::deleted/$1');
});

$routes->group('pegawai', function ($routes) {
    $routes->get('/', 'Admin\Pegawai::index');
    $routes->get('read', 'Admin\Pegawai::read');
    $routes->post('post', 'Admin\Pegawai::post');
    $routes->put('put', 'Admin\Pegawai::put');
    $routes->delete('delete/(:any)', 'Admin\Pegawai::deleted/$1');
});

$routes->group('barang', function ($routes) {
    $routes->get('/', 'Admin\Barang::index');
    $routes->get('read', 'Admin\Barang::read');
    $routes->post('post', 'Admin\Barang::post');
    $routes->put('put', 'Admin\Barang::put');
    $routes->delete('deleted/(:any)', 'Admin\Barang::deleted/$1');
});

$routes->group('customer', function ($routes) {
    $routes->get('/', 'Admin\Customer::index');
    $routes->get('read', 'Admin\Customer::read');
    $routes->post('post', 'Admin\Customer::post');
    $routes->put('put', 'Admin\Customer::put');
    $routes->delete('deleted', 'Admin\Customer::deleted/$1');
});

$routes->group('pesanan', function ($routes) {
    $routes->get('/', 'Admin\Pesanan::index');
    $routes->get('read', 'Admin\Pesanan::read');
    $routes->post('post', 'Admin\Pesanan::post');
    $routes->put('put', 'Admin\Pesanan::put');
    $routes->put('validasi', 'Admin\Pesanan::validasi');
    $routes->delete('deleted', 'Admin\Pesanan::deleted/$1');
    $routes->get('cetak_manifest/(:any)', 'Admin\Pesanan::cetak_manifest/$1');
});

$routes->group('pembelian', function ($routes) {
    $routes->get('/', 'Admin\Pembelian::index');
    $routes->get('read', 'Admin\Pembelian::read');
    $routes->post('post', 'Admin\Pembelian::post');
    $routes->put('put', 'Admin\Pembelian::put');
    $routes->delete('delete/(:any)', 'Admin\Pembelian::deleted/$1');
});

$routes->group('order', function ($routes) {
    $routes->get('/', 'Order::index');
    $routes->get('read', 'Order::read');
    $routes->post('post', 'Order::post');
    $routes->post('bayar', 'Order::bayar');
    $routes->put('put', 'Order::put');
    $routes->delete('deleted', 'Order::deleted/$1');
});

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

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
