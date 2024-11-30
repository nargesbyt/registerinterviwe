<?php 
namespace App;

use Jenssegers\Blade\Blade;
use Rakit\Validation\ErrorBag;

class View{
    protected Blade $blade;
    public function __construct()
    {
        $this->blade=new Blade(__DIR__ .'/../resources/views',__DIR__ . '/../storage/cache/views');
        $this->blade->share('errors',session()->flash('errors')?? new ErrorBag());
    }
  
    public function render(string $view, array $data = []): string
    {
        return $this->blade->render($view, $data);
    }

}