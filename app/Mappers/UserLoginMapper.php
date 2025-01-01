<?php

namespace app\Mappers;

use app\Core\Session;
use app\DTO\Usuario;
use app\Models\UserLoginModel;
/**
 * Description of UsuarioMapper
 *
 * @author Jonathan
 */
class UserLoginMapper {
    
    
    public function getDTO(UserLoginModel $model) {
        $userUpdate = Session::getValue('userlogin');
        $dao = new Usuario();
        $dao->setIdRol($model->getIdRol());
        $dao->setUsername($model->getUsername());
        $dao->setCedula($model->getCedula());
        $dao->setPrimerNombre($model->getPrimerNombre());
        $dao->setSegundoNombre($model->getSegundoNombre());
        $dao->setPrimerApellido($model->getPrimerApellido());
        $dao->setSegundoApellido($model->getSegundoApellido());
        $dao->setCorreo($model->getCorreo());
        $dao->setTelefono($model->getTelefono());
        $dao->setCelular($model->getCelular());
        $dao->setDireccion($model->getDireccion());
        $dao->setUsuarioModifica($userUpdate->getUsername());
        return $dao;
    }
    
    public function getModel(Usuario $dao) {
        $model = new UserLoginModel();
        $model->setId($dao->getId());
        $model->setIdRol($dao->getIdRol());
        $model->setUsername($dao->getUsername());
        $model->setCedula($dao->getCedula());
        $model->setPrimerNombre($dao->getPrimerNombre());
        $model->setSegundoNombre($dao->getSegundoNombre());
        $model->setPrimerApellido($dao->getPrimerApellido());
        $model->setSegundoApellido($dao->getSegundoApellido());
        $model->setCorreo($dao->getCorreo());
        $model->setTelefono($dao->getTelefono());
        $model->setCelular($dao->getCelular());
        $model->setDireccion($dao->getDireccion());
        return $model;
        
    }
    
    
    
}

?>