<?php

namespace app\BO;

use app\DAO\CategoriaDAO;
use app\DTO\Categoria;
use app\Mappers\CategoriaMapper;
use app\Models\CategoriaModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class CategoriaBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new CategoriaDAO();
        $this->dto = new Categoria();
        $this->model = new CategoriaModel();
        $this->mapper = new CategoriaMapper();        
    }

    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
    
    
    
    
}
?>