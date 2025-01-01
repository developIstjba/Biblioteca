<?php

namespace app\Mappers;

use app\DTO\TipoSolicitante;
use app\Models\TipoSolicitanteModel;
/**
 * Description of RolMapper
 *
 * @author Jonathan
 */
class TipoSolicitanteMapper {
    
    
    public function getDTO(TipoSolicitanteModel $model) {
        $dao = new TipoSolicitante();
        $dao->setId($model->getId());
        $dao->setNombre($model->getNombre());
        $dao->setDescripcion($model->getDescripcion());
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
    
    public function getModel(TipoSolicitante $dao) {
        $model = new TipoSolicitanteModel();
        $model->setId($dao->getId());
        $model->setNombre($dao->getNombre());
        $model->setDescripcion($dao->getDescripcion());
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