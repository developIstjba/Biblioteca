<?php

namespace app\Mappers;

use app\DTO\Permiso;
use app\Models\PermisoModel;
/**
 * Description of PermisoMapper
 *
 * @author Jonathan
 */
class PermisoMapper {
    
    
    public function getDTO(PermisoModel $model) {
        $dao = new Permiso();
        $dao->setId($model->getId());
        $dao->setIdRol($model->getIdRol());
        $dao->setDescripcion($model->getDescripcion());
        $dao->setIdMenu($model->getIdMenu());
        $dao->setIdPrivilegio($model->getIdPrivilegio());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Permiso $dao) {
        $model = new PermisoModel();
        $model->setId($dao->getId());
        $model->setIdRol($dao->getIdRol());
        $model->setDescripcion($dao->getDescripcion());
        $model->setIdMenu($dao->getIdMenu());
        $model->setIdPrivilegio($dao->getIdPrivilegio());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        $model->setNombreRol($dao->getNombreRol());
        $model->setNombreMenu($dao->getNombreMenu());
        $model->setNombrePrivilegio($dao->getNombrePrivilegio());
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