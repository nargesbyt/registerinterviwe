<?php

use App\Session;

if(!function_exists('session')){
    function session(){
        return new Session();
    }
}