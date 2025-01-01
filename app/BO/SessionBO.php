<?php

namespace app\BO;

use app\Core\Cliente;
use app\Core\Response;
use app\Core\Token;
use app\DAO\SessionDAO;
use app\DTO\Session;
use app\Mappers\SessionMapper;
use app\Models\SessionModel;

/**
 * Description of TokenSession
 *
 * @author Jonathan
 */
class SessionBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new SessionDAO();
        $this->dto = new Session();
        $this->model = new SessionModel();
        $this->mapper = new SessionMapper();  
    }

    
    public function save($idUsuario) {

        $rsp = new Response();
            
        $this->dto->setIdUsuario($idUsuario);
        $this->dto->setToken(Token::generate());
        $this->dto->setAgente(Cliente::getUserAgent());
        $this->dto->setIpCliente(Cliente::getIp());           

        if($this->dao->guardar($this->dto)){
            $rsp->setType('success');
            $rsp->setMessage('Token de Sessión guardado.');
            $rsp->setData($this->mapper->getModel($this->dto));
            
        }else{                           
            $rsp->setType('error');
            $rsp->setMessage('Error al guardar el Token de Sessión.');
        }

        return $rsp;
        
    }


    public function delete($tksession){
        
        $rsp = new Response();
        
        if($this->dao->eliminarByHash($tksession)){
            $rsp->setType('success');
            $rsp->setMessage('Token de Sessión eliminado.');                
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Error al eliminar el Token de Sessión.');                
        }
                        
        return $rsp;

    }
    
    
    
    
}
?>