<?php namespace App\Controller;



use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class InterviewController{


    public function add(ServerRequestInterface $request): ResponseInterface
    {   
        return "show add interview form";
    }
}