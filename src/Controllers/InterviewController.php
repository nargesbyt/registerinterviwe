<?php

namespace App\Controllers;

use App\Models\CareerField;
use App\Models\Interview;
use Jenssegers\Blade\Blade;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use Laminas\Diactoros\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Rakit\Validation\ErrorBag;

class InterviewController extends BaseController
{
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        // Get the current page from the query string (default is 1)
        $page = (int) ($request->getQueryParams()['page'] ?? 1);

        // Set the number of records per page
        $recordsPerPage = 10;

        // Fetch the interviews for the current page
        $interviews = Interview::list($page, $recordsPerPage);

        // Get the total number of interviews
        $totalCount = Interview::getTotalCount();

        // Calculate total pages
        $totalPages = ceil($totalCount / $recordsPerPage);

        // Pass data to the view
        return new HtmlResponse($this->render('interviews.index', [
            'interviews' => $interviews,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]));
    }

    public function get(ServerRequestInterface $request): ResponseInterface
    {   $id = $request->getAttribute('id');
        $interview = Interview::getById((int)$id);
        return new HtmlResponse($this->render('interviews.show', ['interview' => $interview]));
        
    }


    public function create(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response();
        if ($request->getMethod() == 'GET') {
            $careerFields = CareerField::list();
            //var_dump($careerFields);die;
            $errors = session()->flash('errors')?? new ErrorBag();
            $response->getBody()->write($this->render('interviews.create',['careerFields'=>$careerFields , 'errors'=>$errors]));
            return $response;
        }
        $params = (array)$request->getParsedBody();
        var_dump($params['interviewDate']);die;
        $validation = $this->validate($params, [
            'firstname' => 'required',
            'lastname' => 'required',
            'interviewDate' => 'required',
            'interviewTime'=>'required',
            'careerFieldId'=>'required',

        ]);

        if ($validation->fails()) {
            session()->flash('errors',$validation->errors());
            $errors = $validation->errors()->all();
            $response->getBody()->write($this->render('interviews.create', ['errors' => $errors]));
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
