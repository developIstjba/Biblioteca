<?php

namespace app\Mappers;

use app\DTO\Privilegio;
use app\Models\PrivilegioModel;
/**
 * Description of PrivilegioMapper
 *
 * @author Jonathan
 */
class PrivilegioMapper {
    
    
    public function getDTO(PrivilegioModel $model) {
        $dao = new Privilegio();
        $dao->setId($model->getId());
        $dao->setNombre($model->getNombre());
        $dao->setDescripcion($model->getDescripcion());
        $dao->setNivel($model->getNivel());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Privilegio $dao) {
        $model = new PrivilegioModel();
        $model->setId($dao->getId());
        $model->setNombre($dao->getNombre());
        $model->setDescripcion($dao->getDescripcion());
        $model->setNivel($dao->getNivel());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        return $model;
        
    }
    
    
    public function getListModel($listDTO) {
        
        $list = array();
        foreach ($listDTO as $key => $value) {
            $list[] = $this->getModel($value);
        }
        return $list;
        
    }
    
    
    
}

?>