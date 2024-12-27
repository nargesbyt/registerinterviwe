<?php
namespace App\Services;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ErrorHandlingMiddleware implements MiddlewareInterface
{
    

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (\Exception $e) {
            error_log("Exception caught: " . $e->getMessage()); // Logs error to PHP's default error log

            // Return a custom 500 page response
            $response = new Response();
            $response->getBody()->write('<h1>خطای سرور</h1><p>مشکلی پیش آمده است. لطفا بعدا دوباره امتحان کنید.</p>');
            return $response->withStatus(500)->withHeader('Content-Type', 'text/html');
        }
    }
} 
