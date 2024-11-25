<?php

require '../vendor/autoload.php';

// Include RedBeanPHP and Blade configurations
require '../config/redbean.php'; // Set up RedBeanPHP
$blade = require '../src/config/blade.php'; // Set up Blade template engine

// Initialize router
use League\Route\Router;
use League\Route\RouteCollection;

$router = new Router();
$routes = new RouteCollection;

// Include routes from the routes folder
require '../src/routes/web.php'; // This will load and define the routes

// Dispatch the route
$router->setRoutes($routes);
$router->dispatch();

