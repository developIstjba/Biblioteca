<?php

namespace app\Core;

/**
 * Description of Password
 *
 * @author Jonathan
 */

class Hash {
    
    private const ALGO = 'sha256';

    public static function generate($password){
        
        return hash(self::ALGO, $password);
        
        
    }
    
    public static function verify($password, $hash){
        
        return hash_equals(hash(self::ALGO, $password), $hash);
        
        
    }
    
    
    
    
}
?>