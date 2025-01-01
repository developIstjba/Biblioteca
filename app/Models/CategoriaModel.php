<?php

namespace app\Models;

/**
 * Description of Area
 *
 * @author Jonathan
 */
class CategoriaModel extends BaseModel{
    
    private $id; 
    private $nombre; 
    private $descripcion; 
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }




            
    
    
    
}

?>
