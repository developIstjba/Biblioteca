<?php

namespace app\DAO;

use app\Interfaces\IPermisoDAO;
use app\DTO\Permiso;

/**
 * Description of PermisoDAO
 *
 * @author Jonathan
 */
class PermisoDAO extends BaseDAO implements IPermisoDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsPermiso(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Permiso()));
        return $rsp;
    }  

    public function guardar(Permiso $permiso){
        $sql = 'CALL SpInsPermiso(:idrol, :idmenu, :descripcion, :idPrivilegio, :usercreate)';
        $params = [
            'idrol' => $permiso->getIdRol(),
            'idmenu' => $permiso->getIdMenu(),
            'descripcion' => $permiso->getDescripcion(), 
            'idPrivilegio' => $permiso->getIdPrivilegio(),
            'usercreate' => $permiso->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }  

    
    public function modificar(Permiso $permiso){
        $sql = 'CALL SpUpdPermiso(:id, :idrol, :idmenu, :descripcion, :idPrivilegio, :userupdate)';
        $params = [
            'id' => $permiso->getId(),
            'idrol' => $permiso->getIdRol(),
            'idmenu' => $permiso->getIdMenu(),
            'descripcion' => $permiso->getDescripcion(), 
            'idPrivilegio' => $permiso->getIdPrivilegio(),
            'userupdate' => $permiso->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }  
    
    
    public function eliminar(int $id, string $userUpdate){
        $sql = 'CALL SpDelPermiso(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }
    

    public function leer(int $id) {
        $sql = 'CALL SpConsPermiso(:id)';
        $params = [
            'id' => $id
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Permiso()));
        return $rsp[0];       
    }

}
?>