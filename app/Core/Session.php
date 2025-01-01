<?php

namespace app\Core;


class Session {
    
    private static $name = 'ISTJBA_Bibl';
            
    private static function start(){
        
        if(session_id() == ''){
            ini_set('session.use_only_cookies', true);
            session_name(self::$name);
            session_start();
            
            if (!isset($_SESSION['GENERATED'])) {
              session_regenerate_id();
              $_SESSION['GENERATED'] = time();
              $_SESSION['SERVER_GENERATED_SID']=true;
            }

        }
        
    }
     
    
    public static function update($key, $value){
        
        self::start();
        $name = strtoupper($key);
        if(!isset($_SESSION[$name])){
            $_SESSION[$name] = $value;
        }else if(isset($_SESSION[$name])){
            $_SESSION[$name] = $value;
        }
                
    }
    
    
    public static function getValue($key){
        
        $name = strtoupper($key);
        self::start();
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        
    }    
    
    
    public static function delete($key){
        
        self::start();
        $name = strtoupper($key);
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    
    }
    
    
    public static function finish(){
        self::start();
        session_destroy();
        unset($_SESSION); 
        
    }
    
    
    
}
?>
