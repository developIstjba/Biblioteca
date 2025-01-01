<?php

namespace app\Core;

/**
 * Description of Token
 *
 * @author Jonathan
 */
class Token {
    
    private const LENG = 32;
    
    public static function generate(){
        
        $value = bin2hex(random_bytes(self::LENG));
        Session::update('token', $value);
        return $value;
        
    }
    
    public static function verify($value){
        
        $tk = Session::getValue('token');      
        if($tk != $value){           
            Navegation::redirect('error/e400');
            
        }
        
    }
    
    
}
?>