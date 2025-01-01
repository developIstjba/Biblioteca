<?php

namespace app\Mappers;

use app\DTO\Session;
use app\Models\SessionModel;
/**
 * Description of TokenSessionMapper
 *
 * @author Jonathan
 */
class SessionMapper {
    
    
    public function getDTO(SessionModel $model) {
        $dao = new Session();
        $dao->setId($model->getId());
        $dao->setIdUsuario($model->getIdUsuario());
        $dao->setFechaInicio($model->getFechaInicio());
        $dao->setFechaCierre($model->getFechaCierre());
        $dao->setToken($model->getToken());
        $dao->setAgente($model->getAgente());
        $dao->setEstado($model->getEstado());
        $dao->setIpCliente($model->getIpCliente());
        return $dao;
    }
    
    public function getModel(Session $dao) {
        $model = new SessionModel();
        $model->setId($dao->getId());
        $model->setIdUsuario($dao->getIdUsuario());
        $model->setFechaInicio($dao->getFechaInicio());
        $model->setFechaCierre($dao->getFechaCierre());
        $model->setAgente($dao->getAgente());
        $model->setToken($dao->getToken());
        $model->setEstado($dao->getEstado());
        $model->setIpCliente($dao->getIpCliente());
        return $model;
        
    }
    
    
    
}

?>