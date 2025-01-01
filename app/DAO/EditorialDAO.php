<?php

namespace app\DAO;

use app\DTO\Editorial;
use app\Interfaces\IEditorialDAO;

/**
 * Description of EditorialDAO
 *
 * @author Jonathan
 */
class EditorialDAO extends BaseDAO implements IEditorialDAO{
    
    public function listar(){
        $sql = 'CALL SpConsEditorial(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Editorial()));
        return $rsp;
    }   
    
    public function guardar(Editorial $editorial){
        $sql = 'CALL SpInsEditorial(:nombre, :direccion, :usercreate)';
        $params = [
            'nombre' => $editorial->getNombre(),
            'direccion' => $editorial->getDireccion(),
            'usercreate' => $editorial->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }  

    
    public function modificar(Editorial $editorial){
        $sql = 'CALL SpUpdEditorial(:id, :nombre, :direccion, :userupdate)';
        $params = [
            'id' => $editorial->getId(),
            'nombre' => $editorial->getNombre(),
            'direccion' => $editorial->getDireccion(),
            'userupdate' => $editorial->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }  
    
    
    public function eliminar(int $id, string $userUpdate){
        $sql = 'CALL SpDelEditorial(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }

    public function leer(int $id) {
        $sql = 'CALL SpConsEditorial(:id)';
        $params = [
            'id' => $id
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Editorial()));
        return $rsp[0];        
    }

}
?>