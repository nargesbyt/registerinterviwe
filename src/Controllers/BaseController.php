<?php

namespace App\Controllers;

use App\Application;
use App\Validation\Rules\UniqueRule;
use Jenssegers\Blade\Blade;
use Rakit\Validation\Validator;

abstract class BaseController
{
    protected function render($view, $data = [])
    {
        return app()->view->render($view, $data);
    }

    protected function validate(array $data, array $rules, array $messages = [])
    {
        $validator = new Validator($messages);
        $validator->addValidator('unique', new UniqueRule);
        $validation = $validator->make($data, $rules);

        $validation->validate();
        if($validation->fails()){
            response()->withErrors($validation->errors());
        }
        return $validation;
    }
}
