<?php

namespace app\DAO;

use app\DTO\LibroAutor;
use app\Interfaces\ILibroAutorDAO;

/**
 * Description of TipoLibroDAO
 *
 * @author Jonathan
 */
class LibroAutorDAO extends BaseDAO implements ILibroAutorDAO{
    
    public function leer(int $idLibro, int $idAutor, $estado = null){
        $sql = 'CALL SpConsLibroAutor(:idLibro, :idAutor, :estado)';
        $params = [
            'idLibro' => $idLibro,
            'idAutor' => $idAutor,
            'estado' => $estado
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new LibroAutor()));
        return $rsp;
    }

    
    public function listar(int $idLibro){
        $sql = 'CALL SpConsLibroAutor(:idLibro, :idAutor, :estado)';
        $params = [
            'idLibro' => $idLibro,
            'idAutor' => null,
            'estado' => 1
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new LibroAutor()));
        return $rsp;
    }
    
    
    public function Eliminar(int $idLibro, string $userDelete) {
        $sql = 'CALL SpDelLibroAutor(:idLibro, :userDelete)';
        $params = [
            'idLibro' => $idLibro,
            'userDelete' => $userDelete
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;          
    }

    public function guardar(LibroAutor $libroAutor) {
        $sql = 'CALL SpInsLibroAutor(:idLibro, :idAutor, :userCreate)';
        $params = [
            'idLibro' => $libroAutor->getIdLibro(),
            'idAutor' => $libroAutor->getIdAutor(),
            'userCreate' => $libroAutor->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
    }

    public function modificar(LibroAutor $libroAutor) {
        $sql = 'CALL SpUpdLibroAutor(:idLibro, :idAutor, :estado, :userUpdate)';
        $params = [
            'idLibro' => $libroAutor->getIdLibro(),
            'idAutor' => $libroAutor->getIdAutor(),
            'estado' => $libroAutor->getEstadoAuditoria(),
            'userUpdate' => $libroAutor->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;          
    }
    
    

}
?>