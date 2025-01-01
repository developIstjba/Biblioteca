<?php

namespace app\BO;

use app\Core\Filter;
use app\DAO\MenuDAO;
use app\DTO\Menu;
use app\Mappers\MenuMapper;
use app\Models\MenuModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class MenuBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new MenuDAO();
        $this->dto = new Menu();
        $this->model = new MenuModel();
        $this->mapper = new MenuMapper();        
    }

    
    public function getByRol($idRol) {
      
        if(Filter::isNumeric($idRol)){
            
            $listDAO = $this->dao->listarByRol($idRol); 
            $listModel = $this->mapper->getListModel($listDAO);

            if(Filter::hasValue($listModel)){
                $res = $listModel;
                
            }else{                           
                $res = [];
            }
        
        }else{
            $res = [];
        }
                    
        return $res;
        
    }

    
    public function getAll(){
        
        $listMenus= $this->dao->listar();
        return $this->mapper->getListModel($listMenus);
        
    }
    
    
    
    
    
}
?>