<?php

namespace app\Core;

use app\Controllers\ErrorController;

class App {
    
    private $controller;
    private $method;
    protected $path;

    public function __construct($url){
        
        $array = \explode('/',(isset($url) and !empty($url)) ? \rtrim($url, '/') : header('location: app/login'));
        $base = array_unique($array);
        $base = array_merge($base, array());
        $this->controller = ucfirst($base[0]);
        $this->method = ($base[1])?? '';
        $this->path = require('./config/settings.php'); 
        
    } 
    
    
    public function start() {
        
        $filename = $this->path['folders']['controllers'] . $this->controller . 'Controller.php';              
        
        if (file_exists($filename)) {           
            $object = str_replace(['/','.php','.'], ['\\','',''], $filename );
            $controller = new $object;
            
            if (method_exists($object, $this->method)){ 
               $controller->{$this->method}();
               
            }else{                
                $error = new ErrorController();
                $error->e404();
                
            }

        }else{ 
            
            $error = new ErrorController();
            $error->e404();

        }

        
    }
    
    
}
?>