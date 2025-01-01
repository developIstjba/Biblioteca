<?php

namespace app\Models;

use app\Core\Filter;
use app\Core\Response;

/**
 * Description of Editorial
 *
 * @author Jonathan
 */
class EditorialModel extends BaseModel{
    
    private $id;
    private $nombre;
    private $direccion;
    private $numeroLibros;
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function getNumeroLibros() {
        return $this->numeroLibros;
    }

    public function setNumeroLibros($numeroLibros): void {
        $this->numeroLibros = $numeroLibros;
    }

    public function isValid(){
        
        $ex = new Response(); 
        if(Filter::hasValue($this->nombre)){
            if(Filter::isText($this->nombre)){
                if(Filter::isText($this->direccion) || !Filter::hasValue($this->direccion)){
                    $ex->setType('success');
                    $ex->setMessage('Los datos son válidos.'); 
                }else{
                    $ex->setType('error');
                    $ex->setMessage('El campo dirección solo admite texto.'); 
                }                
            }else{
                $ex->setType('error');
                $ex->setMessage('El campo nombre solo admite texto.');                 
            }            
        }else{
            $ex->setType('error');
            $ex->setMessage('Por favor, ingrese los campos obligatorios.');              
        }
        return $ex;
        
    }
    
    
    
    
}
?>