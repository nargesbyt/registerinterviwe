<?php namespace App\config;

use Jenssegers\Blade\Blade;
var_dump (__DIR__ .'/resources/views');die;

$blade = new Blade(dirname(__DIR__).'../resources/views', dirname(__DIR__) . '../storage/cache');