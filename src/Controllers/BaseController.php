<?php

namespace App\Controllers;

use App\Application;
use App\Validation\Rules\UniqueRule;
use Jenssegers\Blade\Blade;
use Rakit\Validation\ErrorBag;
use Rakit\Validation\Validator;

abstract class BaseController
{

    protected Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(__DIR__.'/../../resources/views',__DIR__.'/../../storage/cache/views');
        //$this->blade->share('errors',session()->flash('errors')?? new ErrorBag());
        //$this->blade->share('old_input', session()->flash('old_input') ?? []);
    }
    protected function render($view, $data = [])
    {
        return $this->blade->render($view, $data);
    }

    protected function validate(array $data, array $rules, array $messages = [])
    {
        $validator = new Validator($messages);
        $validator->addValidator('unique', new UniqueRule);
        $validation = $validator->make($data, $rules);
        if($validation->fails()){
            session()->flash('errors',$validation->errors());
        }
        $validation->validate();
        return $validation;
    }
}
