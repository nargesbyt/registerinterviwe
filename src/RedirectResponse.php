<?php 
namespace App;


use Laminas\Diactoros\Response\RedirectResponse;
use Rakit\Validation\ErrorBag;

class RedirectResponseWithErrors extends RedirectResponse{
    public function __construct(string $url)
    {
        parent::__construct($url);
    }
    public function withErrors(ErrorBag $errors):self{
        session()->flash('errors',$errors);
        return $this;
    }
}