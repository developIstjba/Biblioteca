<?php

namespace app\DAO;

use app\Interfaces\ILibroDAO;
use app\DTO\Libro;

/**
 * Description of LibroDAO
 *
 * @author Jonathan
 */
class LibroDAO extends BaseDAO implements ILibroDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsLibro(:id, :titulo, :idTipo, :idEditorial)';
        $params = [
            'id' => null,
            'titulo' => null,
            'idTipo' => null,
            'idEditorial' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Libro()));
        return $rsp;
    }

    public function eliminar(int $id, string $userUpdate) {
        
        $sql = 'CALL SpDelLibro(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;  
    }

    public function guardar(Libro $libro) {
        
        $sql = 'CALL SpInsLibro(:codigo, :idEditorial, :titulo, :pais, :anio, :isbn, :idTipo, :portada, :url, :copias, :ubicacion, :userCreate)';
        $params = [
            'codigo' => $libro->getCodigo(),
            'idEditorial' => $libro->getIdEditorial(),
            'titulo' => $libro->getTitulo(),
            'pais' => $libro->getPais(),
            'anio' => $libro->getAnio(),
            'isbn' => $libro->getIsbn(),
            'idTipo' => $libro->getIdTipo(),
            'portada' => $libro->getPortada(),
            'url' => $libro->getUrl(),
            'copias' => $libro->getCopias(),
            'ubicacion' => $libro->getUbicacion(),
            'userCreate' => $libro->getUsuarioIngreso()
        ];
        
        $this->bd->execute($sql, $params);
        $rsp = $this->bd->lastInsertId();
        
        return $rsp;
        
    }

    public function leer(int $id) {

        $sql = 'CALL SpConsLibro(:id, :titulo, :idTipo, :idEditorial)';
        $params = [
            'id' => $id,
            'titulo' => null,
            'idTipo' => null,
            'idEditorial' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Libro()));
        return $rsp[0];           
    }

    public function modificar(Libro $libro) {

        $sql = 'CALL SpUpdLibro(:id, :codigo, :idEditorial, :titulo, :pais, :anio, :isbn, :idTipo, :portada, :url, :copias, :ubicacion, :userUpdate)';
        $params = [
            'id' => $libro->getId(),
            'codigo' => $libro->getCodigo(),
            'idEditorial' => $libro->getIdEditorial(),
            'titulo' => $libro->getTitulo(),
            'pais' => $libro->getPais(),
            'anio' => $libro->getAnio(),
            'isbn' => $libro->getIsbn(),
            'idTipo' => $libro->getIdTipo(),
            'portada' => $libro->getPortada(),
            'url' => $libro->getUrl(),
            'copias' => $libro->getCopias(),
            'ubicacion' => $libro->getUbicacion(),
            'userUpdate' => $libro->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;            
    }
    

    public function listarDisponibles(){
        $sql = 'CALL SpConsLibroDisponible(:id, :titulo)';
        $params = [
            'id' => null,
            'titulo' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Libro()));
        return $rsp;
    }    
    
    
}
?>