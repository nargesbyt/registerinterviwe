<?php 
namespace App;
class Session{

    protected const FLASH_KEY='flash_message';
    public function __construct()
    {   
        session_start();

    }
    public function set(string $key,mixed $value):void{
        $_SESSION[$key] = $value;
    }
    public function get(string $key, mixed $default=false){
        return $_SESSION[$key]?? $default;
    }
    public function remove(string $key){
        unset($_SESSION[$key]);
    }
  
   
}