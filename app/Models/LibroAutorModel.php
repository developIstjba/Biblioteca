<?php

namespace app\Models;

class LibroAutorModel extends BaseModel{
    
    private $id;
    private $idLibro;
    private $idAutor;
    private $primerNombre; 
    private $segundoNombre; 
    private $primerApellido; 
    private $segundoApellido; 
    private $corporativo;
    private $nombreCorporativo;    
    
    
    

    public function getId() {
        return $this->id;
    }

    public function getIdLibro() {
        return $this->idLibro;
    }

    public function getIdAutor() {
        return $this->idAutor;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdLibro($idLibro): void {
        $this->idLibro = $idLibro;
    }

    public function setIdAutor($idAutor): void {
        $this->idAutor = $idAutor;
    }

    public function getPrimerNombre() {
        return $this->primerNombre;
    }

    public function getSegundoNombre() {
        return $this->segundoNombre;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }

    public function getCorporativo() {
        return $this->corporativo;
    }

    public function getNombreCorporativo() {
        return $this->nombreCorporativo;
    }

    public function setPrimerNombre($primerNombre): void {
        $this->primerNombre = $primerNombre;
    }

    public function setSegundoNombre($segundoNombre): void {
        $this->segundoNombre = $segundoNombre;
    }

    public function setPrimerApellido($primerApellido): void {
        $this->primerApellido = $primerApellido;
    }

    public function setSegundoApellido($segundoApellido): void {
        $this->segundoApellido = $segundoApellido;
    }

    public function setCorporativo($corporativo): void {
        $this->corporativo = $corporativo;
    }

    public function setNombreCorporativo($nombreCorporativo): void {
        $this->nombreCorporativo = $nombreCorporativo;
    }

    public function getNombreLargo(){
        return $this->primerNombre." ".$this->segundoNombre." ".$this->primerApellido." ".$this->segundoApellido;
    }
    
    
    

}
?>