<?php

namespace app\Mappers;

use app\DTO\Autor;
use app\Models\AutorModel;
/**
 * Description of AutorMapper
 *
 * @author Jonathan
 */
class AutorMapper {
    
    
    public function getDTO(AutorModel $model) {
        $dao = new Autor();
        $dao->setId($model->getId());
        $dao->setPrimerNombre($model->getPrimerNombre());
        $dao->setSegundoNombre($model->getSegundoNombre());
        $dao->setPrimerApellido($model->getPrimerApellido());
        $dao->setSegundoApellido($model->getSegundoApellido());
        $dao->setCorporativo($model->getCorporativo());
        $dao->setNombreCorporativo($model->getNombreCorporativo());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(Autor $dao) {
        $model = new AutorModel();
        $model->setId($dao->getId());
        $model->setPrimerNombre($dao->getPrimerNombre());
        $model->setSegundoNombre($dao->getSegundoNombre());
        $model->setPrimerApellido($dao->getPrimerApellido());
        $model->setSegundoApellido($dao->getSegundoApellido());
        $model->setCorporativo($dao->getCorporativo());
        $model->setNombreCorporativo($dao->getNombreCorporativo());
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