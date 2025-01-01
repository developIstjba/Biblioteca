<?php

namespace app\BO;

use app\DAO\DetalleSolicitudDAO;
use app\DTO\DetalleSolicitud;
use app\Mappers\DetalleSolicitudMapper;
use app\Models\DetalleSolicitudModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class DetalleSolicitudBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new DetalleSolicitudDAO();
        $this->dto = new DetalleSolicitud();
        $this->model = new DetalleSolicitudModel();
        $this->mapper = new DetalleSolicitudMapper();        
    }

    
    public function getAll($idSolicitud){
        
        $libros = $this->dao->listar($idSolicitud);
        return $this->mapper->getListModel($libros);
        
    }
    
     
    
    
    
}
?>