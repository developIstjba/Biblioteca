<?php

namespace app\DAO;

use app\DTO\LibroArea;
use app\Interfaces\ILibroAreaDAO;

/**
 * Description of TipoLibroDAO
 *
 * @author Jonathan
 */
class LibroAreaDAO extends BaseDAO implements ILibroAreaDAO{
    
    public function leer(int $idLibro, int $idArea, $estado = null){
        $sql = 'CALL SpConsLibroArea(:idLibro, :idArea, :estado)';
        $params = [
            'idLibro' => $idLibro,
            'idArea' => $idArea,
            'estado' => $estado
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new LibroArea()));
        return $rsp;
    }

    public function listar(int $idLibro){
        $sql = 'CALL SpConsLibroArea(:idLibro, :idArea, :estado)';
        $params = [
            'idLibro' => $idLibro,
            'idArea' => null,
            'estado' => 1
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new LibroArea()));
        return $rsp;
    }
    
    public function Eliminar(int $idLibro, string $userDelete) {
        $sql = 'CALL SpDelLibroArea(:idLibro, :userDelete)';
        $params = [
            'idLibro' => $idLibro,
            'userDelete' => $userDelete
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;          
    }

    public function guardar(LibroArea $libroArea) {
        $sql = 'CALL SpInsLibroArea(:idLibro, :idArea, :userCreate)';
        $params = [
            'idLibro' => $libroArea->getIdLibro(),
            'idArea' => $libroArea->getIdArea(),
            'userCreate' => $libroArea->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
    }

    public function modificar(LibroArea $libroArea) {
        $sql = 'CALL SpUpdLibroArea(:idLibro, :idArea, :estado, :userUpdate)';
        $params = [
            'idLibro' => $libroArea->getIdLibro(),
            'idArea' => $libroArea->getIdArea(),
            'estado' => $libroArea->getEstadoAuditoria(),
            'userUpdate' => $libroArea->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;          
    }

}
?>