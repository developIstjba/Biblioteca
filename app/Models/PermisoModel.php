<?php

namespace app\Models;

use app\Core\Response;
use app\Core\Filter;

/**
 * Description of Permiso
 *
 * @author Jonathan
 */
class PermisoModel extends BaseModel{
    
    private $id;
    private $idRol;
    private $idMenu; 
    private $idPrivilegio;     
    private $descripcion; 
    private $nombreRol;
    private $nombreMenu;
    private $nombrePrivilegio;

    public function getId() {
        return $this->id;
    }

    public function getIdRol() {
        return $this->idRol;
    }

    public function getIdMenu() {
        return $this->idMenu;
    }

    public function getIdPrivilegio() {
        return $this->idPrivilegio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdRol($idRol): void {
        $this->idRol = $idRol;
    }

    public function setIdMenu($idMenu): void {
        $this->idMenu = $idMenu;
    }

    public function setIdPrivilegio($idPrivilegio): void {
        $this->idPrivilegio = $idPrivilegio;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }
    
    public function getNombreRol() {
        return $this->nombreRol;
    }

    public function getNombreMenu() {
        return $this->nombreMenu;
    }

    public function setNombreRol($nombreRol): void {
        $this->nombreRol = $nombreRol;
    }

    public function setNombreMenu($nombreMenu): void {
        $this->nombreMenu = $nombreMenu;
    }

    public function getNombrePrivilegio() {
        return $this->nombrePrivilegio;
    }

    public function setNombrePrivilegio($nombrePrivilegio): void {
        $this->nombrePrivilegio = $nombrePrivilegio;
    }
        

    public function isValid(){
        
        $ex = new Response();
        if(Filter::isNumeric($this->idRol) && Filter::isNumeric($this->idMenu) && Filter::hasValue($this->descripcion) && Filter::isNumeric($this->idPrivilegio)){

            if(Filter::isText($this->descripcion)){

                $ex->setType('success');
                $ex->setMessage('Los datos son válidos.');  
            }else{
                $ex->setType('error');
                $ex->setMessage('El campo descripción solo admite texto.');  
            }                        
            
        }else{
            $ex->setType('error');
            $ex->setMessage('Por favor, ingrese los campos obligatorios.');     
        }
        
        return $ex;
        
    }
    

    
}
?>