<?php

namespace app\DTO;

/**
 * Description of Permiso
 *
 * @author Jonathan
 */
class Permiso{
    
    private $id;
    private $idRol;
    private $idMenu; 
    private $idPrivilegio;    
    private $descripcion;  
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina; 
    private $nombreRol;
    private $nombreMenu;
    private $nombrePrivilegio;

    public function getId() {
        return $this->id;
    }

    public function getIdRol() {
        return $this->idRol;
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

    public function setIdRol($idRol): void {
        $this->idRol = $idRol;
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

    public function getIdMenu() {
        return $this->idMenu;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdMenu($idMenu): void {
        $this->idMenu = $idMenu;
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

    public function getIdPrivilegio() {
        return $this->idPrivilegio;
    }

    public function getNombrePrivilegio() {
        return $this->nombrePrivilegio;
    }

    public function setIdPrivilegio($idPrivilegio): void {
        $this->idPrivilegio = $idPrivilegio;
    }

    public function setNombrePrivilegio($nombrePrivilegio): void {
        $this->nombrePrivilegio = $nombrePrivilegio;
    }

    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
    }


}
?>