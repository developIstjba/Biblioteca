<?php

namespace app\BO;

use app\DAO\PrivilegioDAO;
use app\DTO\Privilegio;
use app\Mappers\PrivilegioMapper;
use app\Models\PrivilegioModel;

/**
 * Description of PrivilegioBO
 *
 * @author Jonathan
 */
class PrivilegioBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new PrivilegioDAO();
        $this->dto = new Privilegio();
        $this->model = new PrivilegioModel();
        $this->mapper = new PrivilegioMapper();        
    }    
    
    
    public function getAll(){
        
        $listMenus= $this->dao->listar();
        return $this->mapper->getListModel($listMenus);
        
    }
    
    
    
    
}
?>