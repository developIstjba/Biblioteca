<?php

namespace app\Mappers;

use app\DTO\DetalleSolicitud;
use app\Models\DetalleSolicitudModel;
/**
 * Description of AutorMapper
 *
 * @author Jonathan
 */
class DetalleSolicitudMapper {
    
    
    public function getDTO(DetalleSolicitudModel $model) {
        $dao = new DetalleSolicitud();
        $dao->setId($model->getId());
        $dao->setIdLibro($model->getIdLibro());
        $dao->setIdSolicitud($model->getIdSolicitud());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(DetalleSolicitud $dao) {
        $model = new DetalleSolicitudModel();
        $model->setId($dao->getId());
        $model->setIdLibro($dao->getIdLibro());
        $model->setIdSolicitud($dao->getIdSolicitud());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        $model->setTitulo($dao->getTitulo()); 
        $model->setNombreEditorial($dao->getNombreEditorial()); 
        $model->setAutores($dao->getAutores());    
        $model->setCodigo($dao->getCodigo());  
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