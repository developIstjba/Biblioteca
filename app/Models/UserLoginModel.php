<?php


namespace app\Models;


/**
 * Description of Menu
 *
 * @author Jonathan
 */
class UserLoginModel{
    
    private $id;
    private $idRol;
    private $username;
    private $cedula;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $correo;
    private $telefono;
    private $celular;
    private $direccion;
    private $nombreRol; 

    
    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }
    
    public function getIdRol() {
        return $this->idRol;
    }

    public function getUsername() {
        return $this->username;
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

    public function setIdRol($idRol): void {
        $this->idRol = $idRol;
    }

    public function setUsername($username): void {
        $this->username = $username;
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

    public function getNombreRol() {
        return $this->nombreRol;
    }

    public function setNombreRol($nombreRol): void {
        $this->nombreRol = $nombreRol;
    }
    
    public function getNombreLargo() {
        return $this->primerNombre." ".$this->primerApellido." ".$this->segundoApellido;
    }
    
}
?>