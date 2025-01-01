<?php

namespace app\Models;

use app\Core\Filter;
use app\Core\Response;


class RolModel extends BaseModel{
    
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


    public function getNombreEstado() {
        switch ($this->estado) {
            case 0:
                $nombreEstado = 'Eliminado';
                break;

            case 2:
                $nombreEstado = 'Bloqueado';
                break;
            
            default:
                $nombreEstado = 'Activo';
                break;
        }        
        return $nombreEstado;
    }    

    public function isValid(){
        
        $rsp = new Response();
        if(Filter::hasValue($this->mnemonico) && Filter::hasValue($this->nombre) && Filter::hasValue($this->descripcion)){
            if(Filter::isText($this->mnemonico)){
                if(Filter::isText($this->nombre)){
                    if(Filter::isText($this->descripcion)){
                        $rsp->setType('success');
                        $rsp->setMessage('Los datos son válidos.');  

                    }else{
                        $rsp->setType('error');
                        $rsp->setMessage('El campo descripción solo admite texto.');  
                    } 

                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('El campo nombre solo admite texto.');  
                }                 

            }else{
                $rsp->setType('error');
                $rsp->setMessage('El campo código solo admite texto.');  
            }            
            
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Por favor, ingrese los campos obligatorios.');     
        }
        return $rsp;
        
    }

    
    
}
?>