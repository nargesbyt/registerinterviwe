<?php
namespace App\Services;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NotFoundMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // If no route matches, we handle the 404 error.
        $response = new Response();
        $response->getBody()->write('<h1>صفحه یافت نشد</h1><p>متاسفانه صفحه‌ای که به دنبال آن بودید وجود ندارد.</p>');
        return $response->withStatus(404)->withHeader('Content-Type', 'text/html');
    }
}
