<?php

namespace app\DAO;

use app\Interfaces\IDevolucionDAO;
use app\DTO\Devolucion;

/**
 * Description of DevolucionDAO
 *
 * @author Jonathan
 */
class DevolucionDAO extends BaseDAO implements IDevolucionDAO{
    
    public function listar(){
        $sql = 'CALL SpConsDevolucion(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Devolucion()));
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