<?php namespace App\routes;

use App\Controllers\InterviewController;
use App\Controllers\UserController;
use App\Models\User;
use League\Route\RouteCollection;



// Lazy-load callback function for controller methods
function lazyLoadCallback($controller, $method, $params = [])
{
    return function () use ($controller, $method, $params) {
        $controllerInstance = new $controller();
        return call_user_func_array([$controllerInstance, $method], $params);
    };
}

$userController = new UserController($blade);


$router->map('GET', '/interview', [InterviewController::class, 'index']);

$router->map('GET', '/interview/{id}',[InterviewController::class, 'show']);

$router->map('GET', '/add-interview', [InterviewController::class, 'create']);

$router->map('POST', '/add-interview', [InterviewController::class, 'store']);

$router->map('GET', '/', function ($request, $response) use ($blade) {
    echo $blade->make('welcome')->render();
});

$router->map('GET', '/login', [$userController::class, 'showLogin']);

$router->map('GET', '/register', [$userController::class, 'showRegister']);

$router->map('POST', '/login', [$userController::class, 'login']);

$router->map('POST', '/register', [$userController::class, 'register']);

