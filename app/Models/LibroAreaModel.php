<?php

namespace app\Models;

/**
 * Description of Area
 *
 * @author Jonathan
 */
class LibroAreaModel extends BaseModel{
    
    private $id; 
    private $idLibro;
    private $idArea;
    private $nombreArea;
    
    public function getId() {
        return $this->id;
    }

    public function getIdLibro() {
        return $this->idLibro;
    }

    public function getIdArea() {
        return $this->idArea;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdLibro($idLibro): void {
        $this->idLibro = $idLibro;
    }

    public function setIdArea($idArea): void {
        $this->idArea = $idArea;
    }

    public function getNombreArea() {
        return $this->nombreArea;
    }

    public function setNombreArea($nombreArea): void {
        $this->nombreArea = $nombreArea;
    }


    
    


            
      
}

?>
