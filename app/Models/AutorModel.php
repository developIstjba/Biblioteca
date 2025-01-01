<?php

namespace app\Models;

use app\Core\Filter;
use app\Core\Response;

class AutorModel extends BaseModel{
    
    private $id;
    private $primerNombre; 
    private $segundoNombre; 
    private $primerApellido; 
    private $segundoApellido; 
    private $corporativo;
    private $nombreCorporativo;
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

    public function getCorporativo() {
        return $this->corporativo;
    }

    public function getNombreCorporativo() {
        return $this->nombreCorporativo;
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

    public function setCorporativo($corporativo): void {
        $this->corporativo = $corporativo;
    }

    public function setNombreCorporativo($nombreCorporativo): void {
        $this->nombreCorporativo = $nombreCorporativo;
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
    
    
    public function isValid(){
        
        $ex = new Response();
        
        if($this->corporativo == false){
            if(Filter::hasValue($this->primerNombre) && Filter::hasValue($this->primerApellido)){
                if(Filter::isText($this->segundoNombre) || !Filter::hasValue($this->segundoNombre)){
                    if(Filter::isText($this->segundoApellido) || !Filter::hasValue($this->segundoApellido)){
                        $ex->setType('success');
                        $ex->setMessage('Los datos son válidos.'); 
                    }else{
                        $ex->setType('error');
                        $ex->setMessage('El campo segundo apellido solo admite texto.'); 
                    }                
                }else{
                    $ex->setType('error');
                    $ex->setMessage('El campo segundo nombre solo admite texto.');                 
                }            
            }else{
                $ex->setType('error');
                $ex->setMessage('Por favor, ingrese los campos obligatorios.');              
            }
        }else if($this->corporativo == true){
            if(Filter::hasValue($this->nombreCorporativo)){
                if(Filter::isText($this->nombreCorporativo)){
                    $ex->setType('success');
                    $ex->setMessage('Los datos son válidos.');                        
                }else{
                    $ex->setType('error');
                    $ex->setMessage('El campo nombre corporativo solo admite texto.');                     
                }
            
            }else{
                $ex->setType('error');
                $ex->setMessage('Por favor, ingrese los campos obligatorios.');                
            }
        }else{
            $ex->setType('error');
            $ex->setMessage('Los valores ingresados no son válidos.');             
        }
        
        return $ex;
        
    }
    
    
    
}
?>