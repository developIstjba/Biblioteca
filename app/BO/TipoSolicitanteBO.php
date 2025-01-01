<?php

namespace app\BO;

use app\DAO\TipoSolicitanteDAO;
use app\DTO\TipoSolicitante;
use app\Mappers\TipoSolicitanteMapper;
use app\Models\TipoSolicitanteModel;
/**
 * Description of PrestamoBO
 *
 * @author Jonathan
 */
class TipoSolicitanteBO {

    private $dao;
    private $dto;
    private $model;
    private $mapper;
    
    public function __construct()
    {
        $this->dao = new TipoSolicitanteDAO();
        $this->dto = new TipoSolicitante();
        $this->model = new TipoSolicitanteModel();
        $this->mapper = new TipoSolicitanteMapper();
    }

    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
}


?>

