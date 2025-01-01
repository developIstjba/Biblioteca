<?php

namespace app\Mappers;

use app\DTO\TipoLibro;
use app\Models\TipoLibroModel;
/**
 * Description of TipoLibroMapper
 *
 * @author Jonathan
 */
class TipoLibroMapper {
    
    
    public function getDTO(TipoLibroModel $model) {
        $dao = new TipoLibro();
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
    
    public function getModel(TipoLibro $dao) {
        $model = new TipoLibroModel();
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