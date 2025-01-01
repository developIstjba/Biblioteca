<?php

namespace app\DTO;


/**
 * Description of Editorial
 *
 * @author Jonathan
 */
class Editorial {
    
    private $id;
    private $nombre;
    private $direccion;
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina;
    private $numeroLibros;
    
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
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

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
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
    
    public function getDireccion() {
        return $this->direccion;
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
    
    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
    }


    
}
?>