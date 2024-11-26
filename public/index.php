<?php

use App\Application;
use Laminas\Diactoros\ServerRequestFactory;

require __DIR__ .'/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$app = new Application($request);

$response = $app->dispatch();

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);