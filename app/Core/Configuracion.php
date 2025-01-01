<?php

namespace app\Core;

/**
 * Description of Configuracion
 *
 * @author Jonathan
 */
class Configuracion {
    
    protected $bd;
    
    public function __construct() {
        $this->bd = new MariaDB();
    }    
    
    
    public function getParametros(){
        
        $sql = 'CALL SpConsParametros(:mnemonico)';
        $params = [
            'mnemonico' => null
        ];
        
        $array = $this->bd->selectArray($sql, $params);
        $rsp = [];
        
        foreach ($array as $key => $value) {
            $rsp[$value['mnemonico']] = $value['valor'];
        }
        
        return $rsp;
        
        
        
    }
    
    
    
    
    
    
    
}
