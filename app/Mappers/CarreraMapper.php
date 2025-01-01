<?php

namespace app\Mappers;

use app\DTO\Carrera;
use app\Models\CarreraModel;
/**
 * Description of CarreraMapper
 *
 * @author Jonathan
 */
class CarreraMapper {
    
    
    public function getDTO(CarreraModel $model) {
        $dao = new Carrera();
        $dao->setId($model->getId());
        $dao->setNombre($model->getNombre());
        $dao->setMnemonico($model->getMnemonico());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Carrera $dao) {
        $model = new CarreraModel();
        $model->setId($dao->getId());
        $model->setNombre($dao->getNombre());
        $model->setMnemonico($dao->getMnemonico());
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