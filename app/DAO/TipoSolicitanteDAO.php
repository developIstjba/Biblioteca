<?php

namespace app\DAO;

use app\Interfaces\ITipoSolicitanteDAO;
use app\DTO\TipoSolicitante;

/**
 * Description of RolDAO
 *
 * @author Jonathan
 */
class TipoSolicitanteDAO extends BaseDAO implements ITipoSolicitanteDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsTipoSolicitante(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new TipoSolicitante()));
        return $rsp;
    }  

    public function guardar(TipoSolicitante $rol){
        
    }  

    
    public function modificar(TipoSolicitante $rol){   
        
    }  
    
    
    public function Eliminar(int $id, string $userUpdate){     
        
    }    


    public function leer(int $id){
        
    }

}
?>