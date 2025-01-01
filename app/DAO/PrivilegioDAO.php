<?php

namespace app\DAO;

use app\Interfaces\IPrivilegioDAO;
use app\DTO\Privilegio;

/**
 * Description of RolDAO
 *
 * @author Jonathan
 */
class PrivilegioDAO extends BaseDAO implements IPrivilegioDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsPrivilegio(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Privilegio()));
        return $rsp;
    }  

    public function guardar(Privilegio $privilegio){
        $sql = 'CALL SpInsPrivilegio(:nombre, :descripcion, :nivel, :usercreate)';
        $params = [
            'nombre' => $privilegio->getNombre(),
            'descripcion' => $privilegio->getDescripcion(),
            'nivel' => $privilegio->getNivel(),    
            'usercreate' => $privilegio->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }  

    
    public function modificar(Privilegio $privilegio){
        $sql = 'CALL SpUpdPrivilegio(:id, :nombre, :descripcion, :nivel, :userupdate)';
        $params = [
            'id' => $privilegio->getId(),
            'nombre' => $privilegio->getNombre(),
            'descripcion' => $privilegio->getDescripcion(),
            'nivel' => $privilegio->getNivel(),    
            'userupdate' => $privilegio->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }  
    
    
    public function eliminar(int $id, string $userUpdate){
        $sql = 'CALL SpDelPrivilegio(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }

    public function leer(int $id) {
        
    }

}
?>