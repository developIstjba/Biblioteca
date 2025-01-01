<?php

namespace app\Models;

use app\Core\Filter;
use app\Core\Response;

class LibroModel extends BaseModel{
    
    private $id;
    private $codigo;
    private $idEditorial;
    private $titulo;
    private $pais;
    private $anio;
    private $isbn;
    private $idTipo;
    private $portada;
    private $url;
    private $copias;
    private $nombreEditorial;
    private $nombreTipo;
    private $autores;
    private $areas;
    private $flagSolicitud;
    private $disponibilidad;
    private $ubicacion;
    
    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getIdEditorial() {
        return $this->idEditorial;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getIdTipo() {
        return $this->idTipo;
    }

    public function getPortada() {
        return $this->portada;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getCopias() {
        return $this->copias;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    public function setIdEditorial($idEditorial): void {
        $this->idEditorial = $idEditorial;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setPais($pais): void {
        $this->pais = $pais;
    }

    public function setAnio($anio): void {
        $this->anio = $anio;
    }

    public function setIsbn($isbn): void {
        $this->isbn = $isbn;
    }

    public function setIdTipo($idTipo): void {
        $this->idTipo = $idTipo;
    }

    public function setPortada($portada): void {
        $this->portada = $portada;
    }

    public function setUrl($url): void {
        $this->url = $url;
    }

    public function setCopias($copias): void {
        $this->copias = $copias;
    }
    
    public function getNombreEditorial() {
        return $this->nombreEditorial;
    }

    public function getNombreTipo() {
        return $this->nombreTipo;
    }

    public function setNombreEditorial($nombreEditorial): void {
        $this->nombreEditorial = $nombreEditorial;
    }

    public function setNombreTipo($nombreTipo): void {
        $this->nombreTipo = $nombreTipo;
    }
    
    public function getAutores() {
        return $this->autores;
    }

    public function getAreas() {
        return $this->areas;
    }

    public function setAutores($autores): void {
        $this->autores = str_replace(",",", ",$autores);
    }

    public function setAreas($areas): void {
        $this->areas = str_replace(",",", ",$areas);
    }
    
    public function getFlagSolicitud() {
        return $this->flagSolicitud;
    }

    public function setFlagSolicitud($flagSolicitud): void {
        $this->flagSolicitud = $flagSolicitud;
    }
    
    public function getDisponibilidad() {
        return $this->disponibilidad;
    }

    public function setDisponibilidad($disponibilidad): void {
        $this->disponibilidad = $disponibilidad;
    }
    
    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion): void {
        $this->ubicacion = $ubicacion;
    }

    
    public function isValid(){
        
        $rsp = new Response();
        if(Filter::hasValue($this->titulo) && Filter::isNumeric($this->idTipo) && Filter::hasValue($this->pais) && 
                Filter::hasValue($this->anio) && Filter::hasValue($this->copias) && Filter::isNumeric($this->idEditorial)){
                
                if(Filter::isText($this->pais)){
                    if($this->anio >= 1900 && $this->anio <= date("Y")){
                        
                        if(Filter::hasValue($this->isbn)){
                            if(Filter::isNumeric($this->copias) && $this->copias > 0){

                                if(Filter::hasValue($this->autores)){
                                    if(Filter::hasValue($this->areas)){
                                        $rsp->setType('success');
                                        $rsp->setMessage('Los datos son válidos.'); 

                                    }else{
                                        $rsp->setType('error');
                                        $rsp->setMessage('Por favor seleccione al menos una área de conocimiento.');  
                                    }
                                }else{
                                    $rsp->setType('error');
                                    $rsp->setMessage('Por favor seleccione al menos un autor.');  
                                } 

                            }else{
                                $rsp->setType('error');
                                $rsp->setMessage('El campo copias solo admite números.');  
                            }                         
                        }else{
                            $rsp->setType('error');
                            $rsp->setMessage('Por favor ingrese el código ISBN.');  
                        }  
                        
                    }else{
                        $rsp->setType('error');
                        $rsp->setMessage('El campo año admite valores en el siguiente rango (1990'.'-'.date('Y').').');  
                    } 
                                        
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('El campo país solo admite texto.');  
                } 
                        
            
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Por favor, ingrese todos los campos obligatorios.');     
        }
        
        return $rsp;        
        
    }




    
    


    
}
?>