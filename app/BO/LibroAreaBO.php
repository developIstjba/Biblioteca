<?php

namespace app\BO;

use app\DAO\LibroAreaDAO;
use app\DTO\LibroArea;
use app\Mappers\LibroAreaMapper;
use app\Models\LibroAreaModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class LibroAreaBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new LibroAreaDAO();
        $this->dto = new LibroArea();
        $this->model = new LibroAreaModel();
        $this->mapper = new LibroAreaMapper();        
    }

    
    public function getAll($idLibro){
        
        $areas = $this->dao->listar($idLibro);
        return $this->mapper->getListModel($areas);
        
    }

    
    
    
    
}
?>