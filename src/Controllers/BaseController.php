<?php namespace App\Controllers;

class BaseController{

    protected $blade;
    function __construct($blade)
    {
        $this->blade = $blade;
    }

    protected function render($view, $data = [])
    {
        echo $this->blade->make($view, $data)->render();
    }

}