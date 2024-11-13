<?php

namespace App;

use Laminas\Diactoros\Response;
use League\Route\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use UserController;

class Application
{
    protected ServerRequestInterface $request;
    function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }
    public function dispatch(){
        $router = new Router();


        // map a routeyyyyy
        $router->map('GET', '/', function (ServerRequestInterface $request): ResponseInterface {

            $response = new Response();
            $response->getBody()->write('<h1>Hello, World!</h1>');
            return $response;
        });
        
        $router->map('POST', '/login','UserCtrl\UserController::login');

        return $router->dispatch($this->request);
    }
}
