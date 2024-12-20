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

        /*$validator->addRule('persian_alphabet', function ($attribute, $value, $parameters, $validator) {
            // Persian alphabet regex
            $pattern = '/^[\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FEFF}\x{0650}\x{064B}\x{064C}\x{064D}\x{0652}\x{0670}\x{0671}]+$/u';
            
            return preg_match($pattern, $value);
        });
        
        // Validate using this custom rule
        $validation = $validator->make($params, [
            'persianField' => 'required|persian_alphabet',  // Here 'persianField' is the field to validate
        ]);
        
        */

        if($validation->fails()){
            session()->flash('errors',$validation->errors());
        }
        $validation->validate();
        return $validation;
    }
}
