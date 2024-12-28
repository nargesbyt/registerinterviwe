<?php

namespace App;

use App\Controllers\InterviewController;
use App\Controllers\UserController;
use App\Router\Rout;
use App\Services\ErrorHandler;
use App\Services\ErrorHandlingMiddleware;
use App\Services\NotFoundMiddleware;
use Jenssegers\Blade\Blade;
use Laminas\Diactoros\Response;
use RedBeanPHP\R;
use Laminas\Diactoros\ServerRequestFactory;
use League\Route;
use League\Route\Router;
use PDO;
use PDOException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;



class Application
{
  
    public Router $router;
    public PDO $pdo;
    public static $app;
    public Session $session;
    private ServerRequestInterface $request;
   

    public function __construct(ServerRequestInterface $request)
    { 
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=company_test', 'company', 'company_secret');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

        } catch (PDOException $e) {
            // attempt to retry the connection after some timeout for example
            die("Connection failed: " . $e->getMessage());

        }
        self::$app = $this;
        $this->request = $request;
        $this->session= new Session();
        $this->router = new Router();
        $this->setupRoutes();

        // Register error handling middleware
        $this->router->middleware(new ErrorHandlingMiddleware());
        
        $this->router->map('GET', '/{path:.*}', function() {
            $response = new Response();
            $response->getBody()->write('<h1>صفحه یافت نشد</h1><p>متاسفانه صفحه‌ای که به دنبال آن بودید وجود ندارد.</p>');
            return $response->withStatus(404)->withHeader('Content-Type', 'text/html');
        });
        R::setup('mysql:host=localhost;port=3306;dbname=company_test','company', 'company_secret');

    }

    private function setupRoutes()
    {   //this route handle path like /interview?page=2
        $this->router->map('GET', '/interview', [InterviewController::class, 'index']); 

        $this->router->map('GET', '/interview/{id:\d+}', [InterviewController::class, 'get']);

        $this->router->map(['GET', 'POST'], '/interview/create', [InterviewController::class, 'create']);

        $this->router->map('GET', '/interview/{id:\d+}/edit', [InterviewController::class, 'editForm']);
        $this->router->map('POST','/interview/{id:\d+}/delete',[InterviewController::class, 'delete']);

        // Handle the update request (POST request)
        $this->router->map('POST', '/interview/{id:\d+}/edit', [InterviewController::class, 'update']);

        $this->router->map('GET', '/auth/login', [UserController::class, 'showLogin']);

        $this->router->map('POST', '/auth/login', [UserController::class, 'login']);

        $this->router->map(['GET','POST'], '/auth/register', [UserController::class, 'register']);

    }
    public function dispatch(): ResponseInterface
    {   
        return $this->router->dispatch($this->request);
    }
}
