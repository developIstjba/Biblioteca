<?php


namespace app\Models;

use app\Core\Response;
use app\Core\Filter;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class UsuarioModel extends BaseModel{
    
    private $id;
    private $idRol;
    private $username;
    private $password;
    private $cedula;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $correo;
    private $telefono;
    private $celular;
    private $direccion;
    private $estado;
    private $nombreRol;
    
    public function getId() {
        return $this->id;
    }

    public function getIdRol() {
        return $this->idRol;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCedula() {
        return $this->cedula;
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

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdRol($idRol): void {
        $this->idRol = $idRol;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setCedula($cedula): void {
        $this->cedula = $cedula;
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

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    
    public function getNombreLargo() {
        return $this->primerNombre." ".$this->primerApellido." ".$this->segundoApellido;
    }

    public function getNombreRol() {
        return $this->nombreRol;
    }

    public function setNombreRol($nombreRol): void {
        $this->nombreRol = $nombreRol;
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
        
        $ex = new Response();
        if(Filter::hasValue($this->cedula) && Filter::hasValue($this->primerNombre) && Filter::hasValue($this->primerApellido) && Filter::hasValue($this->segundoApellido) && 
                Filter::hasValue($this->correo) && Filter::hasValue($this->celular) && Filter::hasValue($this->direccion) && Filter::hasValue($this->username) && Filter::hasValue($this->idRol)){

            if(Filter::isText($this->primerNombre)){
                if(Filter::isText($this->segundoNombre) || !Filter::hasValue($this->segundoNombre)){
                    if(Filter::isText($this->primerApellido)){
                        if(Filter::isText($this->segundoApellido)){
                            if(Filter::isMail($this->correo)){
                                if(Filter::isPhone($this->telefono)){
                                    if(Filter::isCellphone($this->celular)){
                                        $ex->setType('success');
                                        $ex->setMessage('Los datos son válidos.');  

                                    }else{
                                        $ex->setType('error');
                                        $ex->setMessage('El número de Celular no es válido.');  
                                    } 

                                }else{
                                    $ex->setType('error');
                                    $ex->setMessage('El número de Teléfono no es válido.');  
                                } 

                            }else{
                                $ex->setType('error');
                                $ex->setMessage('La dirección de Correo no es válido.');  
                            } 

                        }else{
                            $ex->setType('error');
                            $ex->setMessage('El campo Segundo Apellido solo admite texto.');  
                        } 

                    }else{
                        $ex->setType('error');
                        $ex->setMessage('El campo Primer Apellido solo admite texto.');  
                    } 

                }else{
                    $ex->setType('error');
                    $ex->setMessage('El campo Segundo Nombre solo admite texto.');  
                } 

            }else{
                $ex->setType('error');
                $ex->setMessage('El campo Primer Nombre solo admite texto.');  
            }            
            
        }else{
            $ex->setType('error');
            $ex->setMessage('Por favor, ingrese todos los campos obligatorios.');     
        }
        
        return $ex;        
        
    }
    
    
    
}
?>