<?php

namespace app\DTO;

class LibroArea{
    
    private $id;
    private $idLibro;
    private $idArea;
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina;  
    private $nombreArea;
    
    
    public function getId() {
        return $this->id;
    }

    public function getIdLibro() {
        return $this->idLibro;
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

    public function setIdLibro($idLibro): void {
        $this->idLibro = $idLibro;
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

    public function getIdArea() {
        return $this->idArea;
    }

    public function setIdArea($idArea): void {
        $this->idArea = $idArea;
    }

    
    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
    }

    public function getNombreArea() {
        return $this->nombreArea;
    }

    public function setNombreArea($nombreArea): void {
        $this->nombreArea = $nombreArea;
    }


    
    
    
}
?>