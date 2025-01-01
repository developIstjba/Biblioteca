<?php

namespace app\DAO;

use app\Interfaces\ITipoLibroDAO;
use app\DTO\TipoLibro;

/**
 * Description of TipoLibroDAO
 *
 * @author Jonathan
 */
class TipoLibroDAO extends BaseDAO implements ITipoLibroDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsTipoLibro(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new TipoLibro()));
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