<?php

namespace app\Core;

class Autoload {

    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }    
    
    private function loader($className) {
        
        if (file_exists(str_replace('\\', '/', $className ) . '.php')) {
            
            require str_replace('\\', '/', $className ) . '.php';            
            
        }else{
            exit('Undefined '.$className.' class');
        }
        
    }
    
    
}
?>