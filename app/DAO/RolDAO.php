<?php

namespace app\DAO;

use app\Interfaces\IRolDAO;
use app\DTO\Rol;

/**
 * Description of RolDAO
 *
 * @author Jonathan
 */
class RolDAO extends BaseDAO implements IRolDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsRol(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Rol()));
        return $rsp;
    }  

    public function guardar(Rol $rol){
        $sql = 'CALL SpInsRol(:nombre, :descripcion, :mnemonico, :usercreate)';
        $params = [
            'nombre' => $rol->getNombre(),
            'descripcion' => $rol->getDescripcion(),
            'mnemonico' => $rol->getMnemonico(),    
            'usercreate' => $rol->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }  

    
    public function modificar(Rol $rol){
        $sql = 'CALL SpUpdRol(:id, :nombre, :descripcion, :mnemonico, :userupdate)';
        $params = [
            'id' => $rol->getId(),
            'nombre' => $rol->getNombre(),
            'descripcion' => $rol->getDescripcion(),
            'mnemonico' => $rol->getMnemonico(),    
            'userupdate' => $rol->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }  
    
    
    public function Eliminar(int $id, string $userUpdate){
        $sql = 'CALL SpDelRol(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }    
    
    
    public function cambiarEstado(Rol $rol){
        $sql = 'CALL SpChaStaRol(:id, :estado, :userupdate)';
        $params = [
            'id' => $rol->getId(),
            'estado' => $rol->getEstado(),
            'userupdate' => $rol->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }


    public function leer(int $id){
        $sql = 'CALL SpConsRol(:id)';
        $params = [
            'id' => $id
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Rol()));
        return $rsp[0];       
        
    }

}
?>