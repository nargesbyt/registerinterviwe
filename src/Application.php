<?php

namespace App;

use App\Controllers\InterviewController;
use App\Controllers\UserController;
use App\Router\Rout;
use Jenssegers\Blade\Blade;
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
        $this->router = new Router();
        $this->setupRoutes();

        //R::setup('mysql:host=127.0.0.1;port=3306;dbname=company_test','company', 'company_secret');
    }
    private function setupRoutes()
    {
        $this->router->map('GET', '/interview', [InterviewController::class, 'index']);

        $this->router->map('GET', '/interview/{id:\d+}', [InterviewController::class, 'get']);

        $this->router->map(['GET', 'POST'], '/interview/create', [InterviewController::class, 'create']);

        $this->router->map(['GET', 'POST'], '/interview/edit', [InterviewController::class, 'edit']);

        /*$this->router->map('GET', '/', function ($request, $response) use ($this->blade) {
            return $blade->make('welcome')->render();
        });*/

        $this->router->map('GET', '/login', [UserController::class, 'showLogin']);

        $this->router->map(['GET','POST'], '/auth/register', [UserController::class, 'register']);

        $this->router->map('POST', '/login', [UserController::class, 'login']);

       // $this->router->map('POST', '/auth/register', [UserController::class, 'register']);
    }

    public function dispatch(): ResponseInterface
    {
        return $this->router->dispatch($this->request);
    }
}
