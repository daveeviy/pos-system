<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Landing & About Pages
$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');

// 2. Customer & User Pages
$routes->get('customers', 'Customers::index');
$routes->get('users', 'Users::index');