<?php

namespace app\Models;

use app\Core\Filter;
use app\Core\Response;


class TipoSolicitanteModel extends BaseModel{
    
    private $id;
    private $nombre;
    private $descripcion;
    private $mnemonico;

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
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

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setMnemonico($mnemonico): void {
        $this->mnemonico = $mnemonico;
    }

    
    
}
?>