<?php

namespace app\Mappers;

use app\DTO\LibroAutor;
use app\Models\LibroAutorModel;
/**
 * Description of AutorMapper
 *
 * @author Jonathan
 */
class LibroAutorMapper {
    
    
    public function getDTO(LibroAutorModel $model) {
        $dao = new LibroAutor();
        $dao->setId($model->getId());
        $dao->setIdLibro($model->getIdLibro());
        $dao->setIdAutor($model->getIdAutor());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
    public function getModel(LibroAutor $dao) {
        $model = new LibroAutorModel();
        $model->setId($dao->getId());
        $model->setIdLibro($dao->getIdLibro());
        $model->setIdAutor($dao->getIdAutor());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        $model->setCorporativo($dao->getCorporativo());
        $model->setNombreCorporativo($dao->getNombreCorporativo());
        $model->setPrimerNombre($dao->getPrimerNombre());
        $model->setSegundoNombre($dao->getSegundoNombre());
        $model->setPrimerApellido($dao->getPrimerApellido());
        $model->setSegundoApellido($dao->getSegundoApellido());          
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