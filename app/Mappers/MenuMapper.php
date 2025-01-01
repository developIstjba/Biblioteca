<?php

namespace app\Mappers;

use app\DTO\Menu;
use app\Models\MenuModel;
/**
 * Description of MenuMapper
 *
 * @author Jonathan
 */
class MenuMapper {
    
    
    public function getDTO(MenuModel $model) {
        $dao = new Menu();
        $dao->setId($model->getId());
        $dao->setIdPermiso($model->getIdPermiso());
        $dao->setDescripcion($model->getDescripcion());
        $dao->setNombre($model->getNombre());
        $dao->setUrl($model->getUrl());
        $dao->setIcono($model->getIcono());
        $dao->setIdPadre($model->getIdPadre());
        $dao->setMnemonico($model->getMnemonico());
        $dao->setNivel($model->getNivel());
        $dao->setEstado($model->getEstado());
        return $dao;
    }
    
    public function getModel(Menu $dao) {
        $model = new MenuModel();
        $model->setId($dao->getId());
        $model->setIdPermiso($dao->getIdPermiso());
        $model->setDescripcion($dao->getDescripcion());
        $model->setNombre($dao->getNombre());
        $model->setUrl($dao->getUrl());
        $model->setIcono($dao->getUrl());
        $model->setIdPadre($dao->getIdPadre());
        $model->setMnemonico($dao->getMnemonico());
        $model->setNivel($dao->getNivel());
        $model->setEstado($dao->getEstado());
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