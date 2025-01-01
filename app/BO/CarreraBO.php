<?php

namespace app\BO;

use app\DAO\CarreraDAO;
use app\DTO\Carrera;
use app\Mappers\CarreraMapper;
use app\Models\CarreraModel;

/**
 * Description of CarreraBO
 *
 * @author Jonathan
 */
class CarreraBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new CarreraDAO();
        $this->dto = new Carrera();
        $this->model = new CarreraModel();
        $this->mapper = new CarreraMapper();        
    }

    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
    
    
    
    
}
?>