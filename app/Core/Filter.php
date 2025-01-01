<?php

namespace app\Core;


class Filter {
    
   
    public static function sanitize($value){

        return filter_input(INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS); 
        
    }
    
    
    public static function hasValue($value){

        if(!empty($value) and !is_null($value)){
            return true;
            
        }elseif(is_array($value) and (count($value) > 0)){
            return true;
        }
        
        return false; 
        
    }
    
    
    public static function isNumeric($value){
        if (filter_var($value, FILTER_VALIDATE_INT)) {
            return true;
        }              
        return false;
    }
    

    public static function isDecimal($value){
        if (filter_var($value, FILTER_VALIDATE_FLOAT)) {
            return true;
        }              
        return false;
    }
    
    
    public static function isMail($value){
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }              
        return false;
    }
     
    
    public static function isCellphone($celular){
        if (preg_match('{^[0][9][0-9]{8}$}', $celular)) {
            return true;
        }
        return false; 
    }	
    
    
    public static function isPhone($telefono){
        if (preg_match('{^[0][2|3|4|5|6|7][2][0-9]{6}$}', $telefono)) {
            return true;
        }
        return false;
    }
    
    
    public static function isPassword($password){
        if (preg_match('/^[A-Za-z\d$@$!%*?¿.]{8,16}$/', $password)) {
            return true;
        }
        return false;   
    }
    
    
    public static function isText($text){
        $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ.]+$/";
        return preg_match($pattern, $text);
    }
    
    
    public static function isImage($value){
        
        if(!empty($_FILES[$value]["type"])){
            
            $valid_extensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES[$value]["name"]);
            $file_extension = end($temporary);
            if((($_FILES[$value]["type"] == "image/png") || ($_FILES[$value]["type"] == "image/jpg") || ($_FILES[$value]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
                
                return true;
            }
        }
        return false;
        
    }
    
}
?>