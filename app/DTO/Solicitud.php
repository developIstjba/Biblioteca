<?php

namespace app\DTO;

class Solicitud{
    
    private $id;
    private $idTipoSolicitante;    
    private $cedula;
    private $nombres;
    private $apellidos;
    private $correo;
    private $telefono;    
    private $celular;
    private $direccion;
    private $fechaPrestamo;
    private $observacionPrestamo;
    private $fechaAutorizacion;
    private $fechaCierre;
    private $observacionCierre;  
    private $estado;
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina;    
    private $nombreTipoSolicitante; 
    private $diasPrestamo;
    private $idArea;
    private $nombreArea;
    
    public function getId() {
        return $this->id;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    public function getObservacionPrestamo() {
        return $this->observacionPrestamo;
    }

    public function getFechaAutorizacion() {
        return $this->fechaAutorizacion;
    }

    public function getFechaCierre() {
        return $this->fechaCierre;
    }

    public function getObservacionCierre() {
        return $this->observacionCierre;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
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

    public function setCedula($cedula): void {
        $this->cedula = $cedula;
    }

    public function setNombres($nombres): void {
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setCelular($celular): void {
        $this->celular = $celular;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setFechaPrestamo($fechaPrestamo): void {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function setObservacionPrestamo($observacionPrestamo): void {
        $this->observacionPrestamo = $observacionPrestamo;
    }

    public function setFechaAutorizacion($fechaAutorizacion): void {
        $this->fechaAutorizacion = $fechaAutorizacion;
    }

    public function setFechaCierre($fechaCierre): void {
        $this->fechaCierre = $fechaCierre;
    }

    public function setObservacionCierre($observacionCierre): void {
        $this->observacionCierre = $observacionCierre;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
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

    public function getIdTipoSolicitante() {
        return $this->idTipoSolicitante;
    }

    public function setIdTipoSolicitante($idTipoSolicitante): void {
        $this->idTipoSolicitante = $idTipoSolicitante;
    }

    public function getNombreTipoSolicitante() {
        return $this->nombreTipoSolicitante;
    }

    public function setNombreTipoSolicitante($nombreTipoSolicitante): void {
        $this->nombreTipoSolicitante = $nombreTipoSolicitante;
    }

    public function getDiasPrestamo() {
        return $this->diasPrestamo;
    }

    public function setDiasPrestamo($diasPrestamo): void {
        $this->diasPrestamo = $diasPrestamo;
    }
        
    public function getIdArea() {
        return $this->idArea;
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