<?php

namespace app\Models;

/**
 * Description of DetallePrestamo
 *
 * @author Jonathan
 */
class DetalleSolicitudModel extends BaseModel{
    
    private $id;
    private $idSolicitud;
    private $idLibro;
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

    public function setId($id): void {
        $this->id = $id;
    }

    public function setIdSolicitud($idSolicitud): void {
        $this->idSolicitud = $idSolicitud;
    }

    public function setIdLibro($idLibro): void {
        $this->idLibro = $idLibro;
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
        $this->autores = str_replace(",",", ",$autores);
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }



    


    
    
}
?>