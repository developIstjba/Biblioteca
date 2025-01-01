<?php

namespace app\DAO;

use app\Interfaces\ISessionDAO;
use app\DTO\Session;

/**
 * Description of SessionDAO
 *
 * @author Jonathan
 */
class SessionDAO extends BaseDAO implements ISessionDAO{
    

    public function guardar(Session $session){
        $sql = 'CALL SpInsSession(:idUsuario, :ipCliente, :agente, :token)';
        $params = [
            'idUsuario' => $session->getIdUsuario(),
            'ipCliente' => $session->getIpCliente(),
            'agente' => $session->getAgente(),
            'token' => $session->getToken()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }    

    
    public function listar(){
        $sql = 'CALL SpConsSession(:token)';
        $params = [
            'token' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Session()));
        return $rsp;        
        
    }
    
    public function eliminarByHash(string $token){
        $sql = 'CALL SpDelSession(:token)';
        $params = [
            'token' => $token
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }


    public function eliminar(int $id, string $userUpdate){
       
        
    }


    public function leer(int $id) {
        $sql = 'CALL SpConsSession(:token)';
        $params = [
            'token' => $id
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Session()));
        return $rsp;         
    }

    public function modificar(object $objeto) {
        
    }

}
?>