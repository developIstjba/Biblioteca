<?php

namespace app\DTO;

class Autor{
    
    private $id;
    private $primerNombre; 
    private $segundoNombre; 
    private $primerApellido; 
    private $segundoApellido; 
    private $corporativo;
    private $nombreCorporativo;
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina;
    private $numeroLibros;    
    
    public function getId() {
        return $this->id;
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

    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    public function getUsuarioIngreso() {
        return $this->usuarioIngreso;
    }

    public function getFechaModifica() {
        return $this->fechaModifica;
    }

    public function getUsuarioModifica() {
        return $this->usuarioModifica;
    }

    public function getFechaElimina() {
        return $this->fechaElimina;
    }

    public function getUsuarioElimina() {
        return $this->usuarioElimina;
    }

    public function setId($id): void {
        $this->id = $id;
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

    public function setFechaIngreso($fechaIngreso): void {
        $this->fechaIngreso = $fechaIngreso;
    }

    public function setUsuarioIngreso($usuarioIngreso): void {
        $this->usuarioIngreso = $usuarioIngreso;
    }

    public function setFechaModifica($fechaModifica): void {
        $this->fechaModifica = $fechaModifica;
    }

    public function setUsuarioModifica($usuarioModifica): void {
        $this->usuarioModifica = $usuarioModifica;
    }

    public function setFechaElimina($fechaElimina): void {
        $this->fechaElimina = $fechaElimina;
    }

    public function setUsuarioElimina($usuarioElimina): void {
        $this->usuarioElimina = $usuarioElimina;
    }

    public function getNumeroLibros() {
        return $this->numeroLibros;
    }

    public function setNumeroLibros($numeroLibros): void {
        $this->numeroLibros = $numeroLibros;
    }

    public function getNombreLargo(){
        return $this->primerNombre." ".$this->segundoNombre." ".$this->primerApellido." ".$this->segundoApellido;
    }
    
    public function getCorporativo() {
        return $this->corporativo;
    }

    public function getNombreCorporativo() {
        return $this->nombreCorporativo;
    }

    public function setCorporativo($corporativo): void {
        $this->corporativo = $corporativo;
    }

    public function setNombreCorporativo($nombreCorporativo): void {
        $this->nombreCorporativo = $nombreCorporativo;
    }     

    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
    }


    
    
}
?>