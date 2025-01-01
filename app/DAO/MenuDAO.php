<?php

namespace app\DAO;

use app\DTO\Menu;
use app\Interfaces\IMenuDAO;

/**
 * Description of MenuDAO
 *
 * @author Jonathan
 */
class MenuDAO extends BaseDAO implements IMenuDAO{
    

    public function listarByRol($idRol){
        $sql = 'CALL SpConsMenuRol(:rol)';
        $params = [
            'rol' => $idRol
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Menu()));
        return $rsp;
    }   
    
    public function listar(){
        $sql = 'CALL SpConsMenu(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Menu()));
        return $rsp;
    }

    public function eliminar(int $id, string $userUpdate) {
        
    }

    public function guardar(object $objeto) {
        
    }

    public function leer(int $id) {
        
    }

    public function modificar(object $objeto) {
        
    }

}
?>