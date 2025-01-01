<?php

namespace app\Models;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class MenuModel{
    
    private $id;
    private $idPermiso;
    private $nombre;
    private $descripcion;
    private $url;
    private $icono;
    private $idPadre;
    private $mnemonico;
    private $nivel;
    private $estado;
    
    public function getId() {
        return $this->id;
    }

    public function getIdPermiso() {
        return $this->idPermiso;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getIdPadre() {
        return $this->idPadre;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdPermiso($idPermiso): void {
        $this->idPermiso = $idPermiso;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setUrl($url): void {
        $this->url = $url;
    }

    public function setIdPadre($idPadre): void {
        $this->idPadre = $idPadre;
    }

    public function getIcono() {
        return $this->icono;
    }

    public function setIcono($icono): void {
        $this->icono = $icono;
    }
    
    public function getMnemonico() {
        return $this->mnemonico;
    }

    public function setMnemonico($mnemonico): void {
        $this->mnemonico = $mnemonico;
    }    
    
    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel): void {
        $this->nivel = $nivel;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }


    

    
}
?>