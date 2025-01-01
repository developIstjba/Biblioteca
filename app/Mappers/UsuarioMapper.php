<?php

namespace app\Mappers;

use app\DTO\Usuario;
use app\Models\UsuarioModel;
/**
 * Description of UsuarioMapper
 *
 * @author Jonathan
 */
class UsuarioMapper {
    
    
    public function getDTO(UsuarioModel $model) {
        $dao = new Usuario();
        $dao->setId($model->getId());
        $dao->setIdRol($model->getIdRol());
        $dao->setUsername($model->getUsername());
        $dao->setPassword($model->getPassword());
        $dao->setCedula($model->getCedula());
        $dao->setPrimerNombre($model->getPrimerNombre());
        $dao->setSegundoNombre($model->getSegundoNombre());
        $dao->setPrimerApellido($model->getPrimerApellido());
        $dao->setSegundoApellido($model->getSegundoApellido());
        $dao->setCorreo($model->getCorreo());
        $dao->setTelefono($model->getTelefono());
        $dao->setCelular($model->getCelular());
        $dao->setEstado($model->getEstado());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setDireccion($model->getDireccion());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Usuario $dao) {
        $model = new UsuarioModel();
        $model->setId($dao->getId());
        $model->setIdRol($dao->getIdRol());
        $model->setUsername($dao->getUsername());
        $model->setPassword($dao->getPassword());
        $model->setCedula($dao->getCedula());
        $model->setPrimerNombre($dao->getPrimerNombre());
        $model->setSegundoNombre($dao->getSegundoNombre());
        $model->setPrimerApellido($dao->getPrimerApellido());
        $model->setSegundoApellido($dao->getSegundoApellido());
        $model->setCorreo($dao->getCorreo());
        $model->setTelefono($dao->getTelefono());
        $model->setCelular($dao->getCelular());
        $model->setEstado($dao->getEstado());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setDireccion($dao->getDireccion());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        $model->setNombreRol($dao->getNombreRol());
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