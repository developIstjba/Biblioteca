<?php

namespace app\DTO;

class Libro{
    
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
    private $estado;
    private $estadoAuditoria;
    private $fechaIngreso;
    private $usuarioIngreso;
    private $fechaModifica;
    private $usuarioModifica;
    private $fechaElimina;
    private $usuarioElimina;
    private $nombreEditorial;
    private $nombreTipo;
    private $autores;
    private $areas;
    private $disponibilidad;
    private $ubicacion;
    
    public function getId() {
        return $this->id;
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

    public function getEstado() {
        return $this->estado;
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

    public function setEstado($estado): void {
        $this->estado = $estado;
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

    public function getNombreTipo() {
        return $this->nombreTipo;
    }

    public function setNombreEditorial($nombreEditorial): void {
        $this->nombreEditorial = $nombreEditorial;
    }

    public function setNombreTipo($nombreTipo): void {
        $this->nombreTipo = $nombreTipo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    public function getAutores() {
        return $this->autores;
    }

    public function getAreas() {
        return $this->areas;
    }

    public function setAutores($autores): void {
        $this->autores = $autores;
    }

    public function setAreas($areas): void {
        $this->areas = $areas;
    }

    public function getEstadoAuditoria() {
        return $this->estadoAuditoria;
    }

    public function setEstadoAuditoria($estadoAuditoria): void {
        $this->estadoAuditoria = $estadoAuditoria;
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


    
}
?>