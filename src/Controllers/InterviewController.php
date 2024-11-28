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
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $interviews = Interview::list();
        return new HtmlResponse($this->blade->render('interviews.index', ['interviews' => $interviews]));
    }

    public function get(ServerRequestInterface $request): ResponseInterface
    {   $id = $request->getAttribute('id');
        $interview = Interview::getById((int)$id);
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
            'firstname' => 'required',
            'lastname' => 'required',
            //'interview_date' => 'required',
            'education' => 'required'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors()->all();
            $response->getBody()->write($this->blade->render('interviews.create', ['errors' => $errors]));
            return $response;
        }

        $result = Interview::save($params);
        if($result){
             return new RedirectResponse('/interview');
        }
        return $response->withStatus(500,'server error');
    
    }
    
    public function edit(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        $params = $request->getParsedBody();
        
        if(Interview::update($params)){
            return new RedirectResponse('/interview');
        }

    }
    /*public function find(ServerRequestInterface $requst,$interviewDate):ResponseInterface
    {

    }*/
}
