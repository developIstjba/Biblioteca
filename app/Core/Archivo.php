<?php

namespace app\Core;

/**
 * Description of Upload
 *
 * @author Jonathan
 */
class Archivo {
    
    protected $path;
    
    public function __construct() {
        $this->path = require('./config/settings.php');
    }
    
    public function upload($file){
        if(is_array($file)){

            $sourcePath = $file['tmp_name'];
            $targetPath = $this->path['files']['portadas'].$file['name'];
            if(move_uploaded_file($sourcePath, $targetPath)){
                return $targetPath;
            }
        }
        return null;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>