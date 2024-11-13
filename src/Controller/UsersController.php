<?php

namespace UserCtrl;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class UserController{

    public function login(ServerRequestInterface $request): ResponseInterface
    {   $username = $request->$_POST['username'];
        $password = $request->$_POST['password'];
        $user = new User();
        $user->getUserByUsername($username);
        if(!is_null($user)){
            $response = new Response();
            $response->getBody()->write('<h1>کاربر با نام و نام خانوادگی ... خوش آمدید.</h1>');
            return $response;
        }


    }
}