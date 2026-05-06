<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);

$routes->setAutoRoute(false);

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
$routes->get('/', 'HomeController::index');

// User - Cart
$routes->post('cart/add', 'CartController::add');
$routes->get('cart', 'CartController::index');
$routes->get('cart/remove/(:num)', 'CartController::remove/$1');

// Checkout
$routes->get('checkout', 'CheckoutController::index');
$routes->post('checkout/process', 'CheckoutController::process');


/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by Auth Filter)
|--------------------------------------------------------------------------
*/

// Login
$routes->get('login', 'LoginController::index');
$routes->post('login/process', 'LoginController::process');
$routes->get('logout', 'LoginController::logout');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // CRUD products
    $routes->get('products', 'ProductController::index');
    $routes->get('products/create', 'ProductController::create');
    $routes->post('products/store', 'ProductController::store');

    $routes->get('products/edit/(:num)', 'ProductController::edit/$1');
    $routes->post('products/update/(:num)', 'ProductController::update/$1');
    $routes->get('products/delete/(:num)', 'ProductController::delete/$1');

    // Categories
    $routes->get('categories', 'CategoryController::index');
    $routes->get('categories/create', 'CategoryController::create');
    $routes->post('categories/store', 'CategoryController::store');
    $routes->get('categories/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('categories/update/(:num)', 'CategoryController::update/$1');
    $routes->get('categories/delete/(:num)', 'CategoryController::delete/$1');

});