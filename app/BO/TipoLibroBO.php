<?php

namespace app\BO;

use app\DAO\TipoLibroDAO;
use app\DTO\TipoLibro;
use app\Mappers\TipoLibroMapper;
use app\Models\TipoLibroModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class TipoLibroBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new TipoLibroDAO();
        $this->dto = new TipoLibro();
        $this->model = new TipoLibroModel();
        $this->mapper = new TipoLibroMapper;        
    }

    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
    
    
    
    
}
?>