<?php

use App\Session;

if(!function_exists('session')){
    function session(){
        return new Session();
    }
}

if (!function_exists('old')) {
    function old($key = null)
    {
        $inputs = session()->flash('old_input') ?? [];
        return $inputs[$key] ?? "";
    }
}