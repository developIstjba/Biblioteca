<?php

namespace app\Models;

/**
 * Description of Area
 *
 * @author Jonathan
 */
class CarreraModel extends BaseModel{
    
    private $id; 
    private $nombre; 
    private $mnemonico;
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getMnemonico() {
        return $this->mnemonico;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setMnemonico($mnemonico): void {
        $this->mnemonico = $mnemonico;
    }






            
    
    
    
}

?>
