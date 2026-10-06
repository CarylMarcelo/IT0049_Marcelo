<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Public Pages
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');

//Register
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');

// Login
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');

// Dashboard
$routes->get('/dashboard', 'Auth::dashboard');

// Logout
$routes->post('/logout', 'Auth::logout');

// Customer CRUD
$routes->get('/customers/create', 'Auth::createCustomer');
$routes->post('/customers/create', 'Auth::storeCustomer');

$routes->get('/customers/view/(:num)', 'Auth::viewCustomer/$1');

$routes->get('/customers/edit/(:num)', 'Auth::editCustomer/$1');
$routes->post('/customers/update/(:num)', 'Auth::updateCustomer/$1');

$routes->post('/customers/delete/(:num)', 'Auth::deleteCustomer/$1');