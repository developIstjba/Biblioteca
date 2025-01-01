<?php

namespace app\Models;

class PrivilegioModel extends BaseModel{

    private $id;
    private $nombre;
    private $descripcion;
    private $nivel;
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getNivel() {
        return $this->nivel;
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

    public function setNivel($nivel): void {
        $this->nivel = $nivel;
    }







}
?>    