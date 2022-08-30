<?php

namespace Config;

use PDO;

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
$routes->setDefaultController('HomeController');
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

/**
 * Filter auth (filter untuk cek status login, kalau sudah login maka arahkan ke dashboad)
 * Filter isAdmin (filter untuk cek hak akses user, kalau admin di perbolehkan akses admin, kalau bukan tendang ke halaman home)
 */

<<<<<<< HEAD
$routes->post('encrypt_url', 'GeneralController::encrypt_url');
$routes->post('decrypt_url', 'GeneralController::decrypt_url');
=======
>>>>>>> 4d88ee4a47cab338d56cbb24151a8225a9707f33

$routes->group('', function ($routes) {
    $routes->get('/', 'AuthController::index');
});

$routes->group('auth', function ($routes) {
    $routes->get('/', 'AuthController::index');
    $routes->get('login', 'AuthController::index');
    $routes->post('login', 'AuthController::login');
    $routes->get('register', 'AuthController::form_register');
    $routes->post('register', 'AuthController::register');

    $routes->get('forgot', 'AuthController::form_forgot');
    $routes->post('forgot', 'AuthController::forgot');
    $routes->get('reset/(:hash)', 'AuthController::form_reset/$1');
    $routes->post('reset', 'AuthController::reset_password');
    $routes->post('logout', 'AuthController::logout');
});

$routes->group('admin', ['filter' => ['auth', 'isAdmin']], function ($routes) {
    $routes->get('/', 'DashboardController::index');

    $routes->group('maps', function ($routes) {
        $routes->get('/', 'MapsController::index');
        $routes->get('detail-maps/(:any)', 'MapsController::detail/$1');
        $routes->get('manajemen-maps', 'MapsController::manajemenMaps');
        $routes->post('datatables', 'MapsController::datatables');
        $routes->get('add', 'MapsController::add');
        $routes->post('store', 'MapsController::store');
        $routes->get('edit/(:any)', 'MapsController::edit/$1');
        $routes->post('update', 'MapsController::update');
        $routes->delete('delete', 'MapsController::delete');
    });

    $routes->group('kategori', function ($routes) {
        $routes->get('/', 'KategoriController::index');
        $routes->post('datatables', 'KategoriController::datatables');
        $routes->post('add', 'KategoriController::add');
        $routes->post('edit', 'KategoriController::edit');
        $routes->post('update', 'KategoriController::update');
        $routes->post('store', 'KategoriController::store');
        $routes->delete('delete', 'KategoriController::delete');
    });

    $routes->group('sistem', function ($routes) {
        $routes->get('/', 'SistemController::index');
        $routes->post('update', 'SistemController::update');
        $routes->post('save_logo_favicon', 'SistemController::save_logo_favicon');
    });

    $routes->group('users', function ($routes) {
        $routes->get('/', 'UsersController::index');
        $routes->post('datatables', 'UsersController::datatables');
        $routes->post('add', 'UsersController::add');
        $routes->post('store', 'UsersController::store');
        $routes->post('edit', 'UsersController::edit');
        $routes->post('update', 'UsersController::update');
        $routes->post('detail', 'UsersController::detail');
        $routes->delete('delete', 'UsersController::delete');
        $routes->post('change_password', 'UsersController::change_password');
    });
    // Change password for user
    $routes->post('change_password', 'UsersController::change_password', ['filter' => 'auth']);
});

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
