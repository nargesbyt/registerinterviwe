<?php

require '../vendor/autoload.php';

// Include RedBeanPHP and Blade configurations
require '../src/config/redbean.php'; // Set up RedBeanPHP
$blade = require '../src/config/blade.php'; // Set up Blade template engine
var_dump($blade);die;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\ServerRequestFactory;

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);
// Initialize router
use League\Route\Router;
use League\Route\RouteCollection;

$router = new League\Route\Router();

// Load routes from external file (we'll create this later)
require_once '../src/routes/web.php';

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);