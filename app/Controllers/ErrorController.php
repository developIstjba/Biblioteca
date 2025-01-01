<?php

namespace app\Controllers;

use app\Core\Controller;


/**
 * Description of ErrorController
 *
 * @author Jonathan
 */
class ErrorController extends Controller{

    
    public function __construct() {
        
        parent::__construct();
        
    }

    
    public function e400(){
        
        $this->view->render($this, 'error400', null);
        
    }
    
    
    public function e403(){
        
        $this->view->render($this, 'error403', null);
        
    }
    
 
    public function e404(){
        
        $this->view->render($this, 'error404', null);
        
    }
    
}
?>