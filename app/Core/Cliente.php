<?php

namespace app\Core;

/**
 * Description of Response
 *
 * @author Jonathan
 */
class Cliente {
    
    public static function getIp(){
        
        $ipaddress = '';
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
        
    }


    public static function getUserAgent(){
        
        $userAgent = '';
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }else{
            $userAgent = 'UNKNOWN';
        }
        return $userAgent;
        
    }
    
    
}
?>