<?php

namespace app\Mappers;

use app\DTO\Solicitud;
use app\Models\SolicitudModel;
/**
 * Description of UsuarioMapper
 *
 * @author Jonathan
 */
class SolicitudMapper {
    
    
    public function getDTO(SolicitudModel $model) {
        $dao = new Solicitud();
        $dao->setId($model->getId());
        $dao->setIdTipoSolicitante($model->getIdTipoSolicitante());
        $dao->setCedula($model->getCedula());
        $dao->setNombres($model->getNombres());
        $dao->setApellidos($model->getApellidos());
        $dao->setCorreo($model->getCorreo());
        $dao->setTelefono($model->getTelefono());
        $dao->setCelular($model->getCelular());
        $dao->setDireccion($model->getDireccion());
        $dao->setFechaPrestamo($model->getFechaPrestamo());
        $dao->setObservacionPrestamo($model->getObservacionPrestamo());
        $dao->setFechaAutorizacion($model->getFechaAutorizacion());
        $dao->setFechaCierre($model->getFechaCierre());
        $dao->setObservacionCierre($model->getObservacionCierre());
        $dao->setIdArea($model->getIdArea()); 
        $dao->setNombreArea($model->getNombreArea()); 
        $dao->setEstado($model->getEstado());
        $dao->setDiasPrestamo($model->getDiasPrestamo());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Solicitud $dao) {
        $model = new SolicitudModel();
        $model->setId($dao->getId());
        $model->setIdTipoSolicitante($dao->getIdTipoSolicitante());        
        $model->setCedula($dao->getCedula());
        $model->setNombres($dao->getNombres());
        $model->setApellidos($dao->getApellidos());
        $model->setCorreo($dao->getCorreo());
        $model->setTelefono($dao->getTelefono());
        $model->setCelular($dao->getCelular());
        $model->setDireccion($dao->getDireccion());
        $model->setFechaPrestamo($dao->getFechaPrestamo());
        $model->setObservacionPrestamo($dao->getObservacionPrestamo());
        $model->setFechaCierre($dao->getFechaCierre());
        $model->setObservacionCierre($dao->getObservacionCierre());
        $model->setIdArea($dao->getIdArea());
        $model->setNombreArea($dao->getNombreArea());
        $model->setFechaAutorizacion($dao->getFechaAutorizacion());         
        $model->setEstado($dao->getEstado());
        $model->setDiasPrestamo($dao->getDiasPrestamo());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        $model->setNombreTipoSolicitante($dao->getNombreTipoSolicitante()); 
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