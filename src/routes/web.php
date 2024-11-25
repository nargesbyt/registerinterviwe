<?php namespace App\routes;

use App\Controller\InterviewController;
use League\Route\RouteCollection;
use Controllers\HomeController;
use Controllers\UserController;

// Lazy-load callback function for controller methods
function lazyLoadCallback($controller, $method, $params = [])
{
    return function () use ($controller, $method, $params) {
        $controllerInstance = new $controller();
        return call_user_func_array([$controllerInstance, $method], $params);
    };
}

$router->map('GET', '/', [InterviewController::class, 'index']);

$router->map('GET', '/interview/{id}',[InterviewController::class, 'show']);

$router->map('GET', '/add-interview', [InterviewController::class, 'create']);

$router->map('POST', '/add-interview', [InterviewController::class, 'store']);
