<?php

namespace app\BO;

use app\DAO\LibroAutorDAO;
use app\DTO\LibroAutor;
use app\Mappers\LibroAutorMapper;
use app\Models\LibroAutorModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class LibroAutorBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new LibroAutorDAO();
        $this->dto = new LibroAutor();
        $this->model = new LibroAutorModel();
        $this->mapper = new LibroAutorMapper();        
    }

    
    public function getAll($idLibro){
        
        $autores = $this->dao->listar($idLibro);
        return $this->mapper->getListModel($autores);
        
    }
    
     
    
    
    
}
?>