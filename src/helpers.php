<?php

use App\Application;
use App\Response;
use App\Session;

if (! function_exists('app')) {
    function app(): Application
    {
        return Application::$app;
    }
}

if (! function_exists('response')) {

    function response(): Response
    {
        return app()->response;
    }
}

if (! function_exists('redirect')) {

    function redirect(string $url): Response
    {
        return response()->redirect($url);
    }
}

if(!function_exists('session')){
    function session(){
        return new Session();
    }
}