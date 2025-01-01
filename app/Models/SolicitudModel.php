<?php

namespace app\Models;

use app\Core\Filter;
use app\Core\Response;
use app\Core\Session;

class SolicitudModel extends BaseModel{
    
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
    private $numero;
    private $libros;
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

                
    public function getNumero() {
        
        $parametros = Session::getValue('parametros');
        switch ($this->id) {
            case $this->id < 10:
                $codigo = '-00000'; 
                break;

            case $this->id < 100:
                $codigo = '-0000'; 
                break;            

            case $this->id < 1000:
                $codigo = '-000'; 
                break;

            case $this->id < 10000:
                $codigo = '-00'; 
                break;
            
            case $this->id < 100000:
                $codigo = '-0'; 
                break;            
            
            default:
                $codigo = '-';
                break;
        }
        return $parametros['NCSOL'].$codigo.$this->id;
    }

    public function setNumero($numero): void {
        $this->numero = $numero;
    }
    
    public function getLibros() {
        return $this->libros;
    }

    public function setLibros($libros): void {
        $this->libros = $libros;
    }    
    
    public function getIdArea() {
        return $this->idArea;
    }

    public function setIdArea($idArea): void {
        $this->idArea = $idArea;
    }
    
    public function getDiasPrestamo() {
        return $this->diasPrestamo;
    }

    public function setDiasPrestamo($diasPrestamo): void {
        $this->diasPrestamo = $diasPrestamo;
    }
        
    public function getNombreArea() {
        return $this->nombreArea;
    }

    public function setNombreArea($nombreArea): void {
        $this->nombreArea = $nombreArea;
    }   
    
    public function isValid(){
        
        $rsp = new Response();
        if(Filter::hasValue($this->cedula) && Filter::hasValue($this->nombres) && Filter::isNumeric($this->idTipoSolicitante)&& 
                Filter::hasValue($this->apellidos) && Filter::hasValue($this->correo) && Filter::isNumeric($this->idArea) &&
                Filter::hasValue($this->celular) && Filter::hasValue($this->fechaPrestamo)){
            
            if(Filter::isText($this->nombres)){
                
                if(Filter::isText($this->apellidos)){

                    if(Filter::isNumeric($this->idTipoSolicitante)){

                        if(Filter::hasValue($this->libros)){
                            $rsp->setType('success');
                            $rsp->setMessage('Los datos son válidos.'); 

                        }else{
                            $rsp->setType('error');
                            $rsp->setMessage('Por favor seleccione al menos un libro.');  
                        }

                    }else{
                        $rsp->setType('error');
                        $rsp->setMessage('El campo Tipo de Solicitud solo admite números.');  
                    }                         
                                    
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('El campo apellidos solo admite texto.');  
                } 
                

            }else{
                $rsp->setType('error');
                $rsp->setMessage('El campo nombres solo admite texto.');  
            }            
            
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Por favor, ingrese todos los campos obligatorios.');     
        }
        
        return $rsp;        
        
    }
    
    

}
?>