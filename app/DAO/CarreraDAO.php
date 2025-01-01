<?php

namespace app\DAO;

use app\DTO\Carrera;
use app\DTO\Categoria;
use app\Interfaces\ICarreraDAO;

/**
 * Description of CarreraDAO
 *
 * @author Jonathan
 */
class CarreraDAO extends BaseDAO implements ICarreraDAO{
    
    public function listar(){
        $sql = 'CALL SpConsCarrera(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Carrera()));
        return $rsp;
    }

    public function Eliminar(int $id, string $userUpdate) {
        
    }

    public function guardar(Carrera $area) {
        
    }

    public function leer(int $id) {
        
    }

    public function modificar(Carrera $area) {
        
    }

}
?>
