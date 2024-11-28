<?php

namespace App\Controllers;

use App\Application;
use App\UniqueRule;
use Jenssegers\Blade\Blade;
use Rakit\Validation\Validator;

abstract class BaseController
{
    protected Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(__DIR__ . '/../../resources/views', dirname(__DIR__) . '/../../storage/cache');
        //var_dump(__DIR__ . '/../../resources/views');
    }

    protected function render($view, $data = [])
    {
        return $this->blade->make($view, $data)->render();
    }

    protected function validate(array $data, array $rules, array $messages = [])
    {
        $validator = new Validator($messages);
        $validator->addValidator('unique', new UniqueRule($pdo));
        $validation = $validator->make($data, $rules);

        $validation->validate();
        return $validation;
    }
}
