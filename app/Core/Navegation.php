<?php

namespace app\Core;

/**
 * Description of Url
 *
 * @author Jonathan
 */
class Navegation {
    
            
    public static function redirect($url){
        
        header('location: /'.$url);
        
    }
    
    
    public static function getUrl(){
        
        try{
            
            $array = \explode('/',($_GET['url']));
            $base = array_unique($array);
            $base = array_merge($base, array());
            return $base[0].'/'.$base[1];
        
        } catch (Exception $err){
            
            return null;
            
        }
        
    }
    
    
    
}
?>