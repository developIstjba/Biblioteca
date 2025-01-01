<?php

namespace app\DTO;

/**
 * Description of DetallePrestamo
 *
 * @author Jonathan
 */
class DetalleSolicitud {
    
    private $id;
    private $idSolicitud;
    private $idLibro;
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina;
    private $nombreEditorial;
    private $titulo;
    private $autores;
    private $codigo;
    
    public function getId() {
        return $this->id;
    }

    public function getIdSolicitud() {
        return $this->idSolicitud;
    }

    public function getIdLibro() {
        return $this->idLibro;
    }

    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
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

    public function setIdSolicitud($idSolicitud): void {
        $this->idSolicitud = $idSolicitud;
    }

    public function setIdLibro($idLibro): void {
        $this->idLibro = $idLibro;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
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


    public function getNombreEditorial() {
        return $this->nombreEditorial;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutores() {
        return $this->autores;
    }

    public function setNombreEditorial($nombreEditorial): void {
        $this->nombreEditorial = $nombreEditorial;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setAutores($autores): void {
        $this->autores = $autores;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }


    
}
?>