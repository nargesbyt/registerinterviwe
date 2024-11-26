<?php

namespace App\Controllers;

use App\Models\Interview;
use Jenssegers\Blade\Blade;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class InterviewController extends BaseController
{

    public function get($id): ResponseInterface
    {
        $interview = Interview::getById($id);
        return new HtmlResponse($this->blade->render('interviews.show', ['interview' => $interview]));
        
    }

    public function create(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        if ($request->getMethod() == 'GET') {

            $response->getBody()->write($this->blade->render('interviews.create'));
            return $response;
        }
        $params = (array)$request->getParsedBody();

        $validation = $this->validate($params, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:4',
            'interview_date' => 'required',
            'education' => 'required|min:5'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $response->getBody()->write($this->render('register', ['errors' => $errors]));
            return $response;
        }

        Interview::save($params);
        return new RedirectResponse('/');
    }
    public function index(ServerRequestInterface $request):ResponseInterface
    {
        $interviews = Interview::list();
        return new HtmlResponse($this->blade->render('interviews.index', ['interviews' => $interviews]));  
    }
    /*public function find(ServerRequestInterface $requst,$interviewDate):ResponseInterface
    {

    }*/
}
