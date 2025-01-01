<?php

namespace app\Mappers;

use app\DTO\LibroArea;
use app\Models\LibroAreaModel;
/**
 * Description of AutorMapper
 *
 * @author Jonathan
 */
class LibroAreaMapper {
    
    
    public function getDTO(LibroAreaModel $model) {
        $dao = new LibroArea();
        $dao->setId($model->getId());
        $dao->setIdLibro($model->getIdLibro());
        $dao->setIdArea($model->getIdArea());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina());
        return $dao;
    }
    
    public function getModel(LibroArea $dao) {
        $model = new LibroAreaModel();
        $model->setId($dao->getId());
        $model->setIdLibro($dao->getIdLibro());
        $model->setIdArea($dao->getIdArea());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina());
        $model->setNombreArea($dao->getNombreArea());        
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