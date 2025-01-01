<?php

namespace app\DAO;

use app\Interfaces\ICategoriaDAO;
use app\DTO\Categoria;

/**
 * Description of TipoLibroDAO
 *
 * @author Jonathan
 */
class CategoriaDAO extends BaseDAO implements ICategoriaDAO{
    
    public function listar(){
        $sql = 'CALL SpConsArea(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Categoria()));
        return $rsp;
    }

    public function Eliminar(int $id, string $userUpdate) {
        
    }

    public function guardar(Categoria $area) {
        
    }

    public function leer(int $id) {
        
    }

    public function modificar(Categoria $area) {
        
    }

}
?>