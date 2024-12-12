<?php

use App\Application;
use App\Response;
use App\Session;

if (! function_exists('app')) {
    function app(): Application
    {
        return Application::$app;
    }
}

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

function persianToGregorian($persianDate) {
    // Split the Persian date (assuming it's in the format: YYYY/MM/DD)
    list($year, $month, $day) = explode('/', $persianDate);
    
    // Convert Persian date to Gregorian date
    $gregorianDate = Jalalian::fromFormat('Y/m/d', "$year/$month/$day")->toCarbon()->toDateString();
    
    return $gregorianDate;
}