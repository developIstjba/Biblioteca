<?php

namespace app\Core;


/**
 * Description of Controller
 *
 * @author Jonathan
 */
class Controller {
    
    public $view;
    
    public function __construct() {
        $this->view = new View();
    }

    public function validateSession(){
               
        if(!Filter::hasValue(Session::getValue('tksession')) && 
            (Session::getValue('useragente') !== $_SERVER['HTTP_USER_AGENT'] || Session::getValue('ipcliente') !== $_SERVER['REMOTE_ADDR'])){       
            Navegation::redirect('app/logout');
        }
        
    }
    

    public function updateRouteSessions(){
        
        Session::update('previousroute', (!is_null(Session::getValue('currentroute'))) ? Session::getValue('currentroute'): Navegation::getUrl());
        Session::update('currentroute', Navegation::getUrl());

    }
    
    
    public function disableRoute(){
              
        if(Filter::hasValue(Session::getValue('tksession'))){
            Navegation::redirect(Session::getValue('previousroute'));
            
        }
        
    }
    
    
    public function getAccessLevel($submenu, $mnemonico){
        
        foreach ($submenu as $key => $value) {
            if($value->getMnemonico() == $mnemonico){
                return $value->getNivel();
            }
        }
        
        return null;
    }
    
    
    
}
?>