<?php

namespace app\Mappers;

use app\DTO\Libro;
use app\Models\LibroModel;
/**
 * Description of UsuarioMapper
 *
 * @author Jonathan
 */
class LibroMapper {
    
    
    public function getDTO(LibroModel $model) {
        $dao = new Libro();
        $dao->setId($model->getId());
        $dao->setCodigo($model->getCodigo());
        $dao->setIdEditorial($model->getIdEditorial());
        $dao->setTitulo($model->getTitulo());
        $dao->setPais($model->getPais());
        $dao->setAnio($model->getAnio());
        $dao->setIsbn($model->getIsbn());
        $dao->setIdTipo($model->getIdTipo());
        $dao->setUbicacion($model->getUbicacion());
        $dao->setPortada($model->getPortada());
        $dao->setUrl($model->getUrl());
        $dao->setCopias($model->getCopias());
        $dao->setDisponibilidad($model->getDisponibilidad());
        $dao->setEstadoAuditoria($model->getEstadoAuditoria());
        $dao->setFechaIngreso($model->getFechaIngreso());
        $dao->setUsuarioIngreso($model->getUsuarioIngreso());
        $dao->setFechaModifica($model->getFechaModifica());
        $dao->setUsuarioModifica($model->getUsuarioModifica());
        $dao->setFechaElimina($model->getFechaElimina());
        $dao->setUsuarioElimina($model->getUsuarioElimina()); 
        return $dao;
    }
    
        public function getModel(Libro $dao) {
        $model = new LibroModel();
        $model->setId($dao->getId());
        $model->setCodigo($dao->getCodigo());
        $model->setIdEditorial($dao->getIdEditorial());
        $model->setTitulo($dao->getTitulo());
        $model->setPais($dao->getPais());
        $model->setAnio($dao->getAnio());
        $model->setIsbn($dao->getIsbn());
        $model->setIdTipo($dao->getIdTipo());
        $model->setUbicacion($dao->getUbicacion());
        $model->setPortada($dao->getPortada());
        $model->setUrl($dao->getUrl());
        $model->setAutores($dao->getAutores());
        $model->setAreas($dao->getAreas());
        $model->setCopias($dao->getCopias());
        $model->setDisponibilidad($dao->getDisponibilidad());
        $model->setEstadoAuditoria($dao->getEstadoAuditoria());
        $model->setFechaIngreso($dao->getFechaIngreso());
        $model->setUsuarioIngreso($dao->getUsuarioIngreso());
        $model->setFechaModifica($dao->getFechaModifica());
        $model->setUsuarioModifica($dao->getUsuarioModifica());
        $model->setFechaElimina($dao->getFechaElimina());
        $model->setUsuarioElimina($dao->getUsuarioElimina()); 
        $model->setNombreEditorial($dao->getNombreEditorial());
        $model->setNombreTipo($dao->getNombreTipo());
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