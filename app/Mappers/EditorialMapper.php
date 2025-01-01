<?php

namespace app\Mappers;

use app\DTO\Editorial;
use app\Models\EditorialModel;
/**
 * Description of EditorialMapper
 *
 * @author Jonathan
 */
class EditorialMapper {
    
    
    public function getDTO(EditorialModel $model) {
        $dao = new Editorial();
        $dao->setId($model->getId());
        $dao->setNombre($model->getNombre());
        $dao->setDireccion($model->getDireccion());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Editorial $dao) {
        $model = new EditorialModel();
        $model->setId($dao->getId());
        $model->setNombre($dao->getNombre());
        $model->setDireccion($dao->getDireccion());
        $model->setNumeroLibros($dao->getNumeroLibros());
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