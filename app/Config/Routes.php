<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProductController::index');

// user

// admin
$routes->group('admin', ['filter' => 'auth'], function($routes) {
$routes->get('products', 'ProductController::index');
$routes->get('products/create', 'ProductController::create');
$routes->post('products/store', 'ProductController::store');

$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');
});

// login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/process', 'LoginController::process');
$routes->get('/logout', 'LoginController::logout');