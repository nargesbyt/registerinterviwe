<?php 
namespace App;


use Laminas\Diactoros\Response\RedirectResponse;
use Rakit\Validation\ErrorBag;

class Response
{
    public function redirect(string $url):self
    {
        header("Location: $url");
        return $this;
    }
    public function withErrors(ErrorBag $errors):self
    {
        session()->flash('errors',$errors);
        return $this;
    }
}