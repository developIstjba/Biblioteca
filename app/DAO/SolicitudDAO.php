<?php

namespace app\DAO;

use app\DTO\Solicitud;
use app\Interfaces\ISolicitudDAO;

/**
 * Description of PrestamoDAO
 *
 * @author Jonathan
 */
class SolicitudDAO extends BaseDAO implements ISolicitudDAO{
    
    
    public function listar(){
        $sql = 'CALL SpConsPrestamo(:id, :estado)';
        $params = [
            'id' => null,
            'estado' => 1
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Solicitud()));
        return $rsp;
    }
    
    
    public function listarByEstado(int $estado){
        $sql = 'CALL SpConsPrestamo(:id, :estado)';
        $params = [
            'id' => null,
            'estado' => $estado
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Solicitud()));
        return $rsp;
    }

    public function eliminar(int $id, string $userUpdate) {
        $sql = 'CALL SpDelSolicitud(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;  
    }

    public function guardar(Solicitud $solicitud) {
        $sql = 'CALL SpInsSolicitud(:cedula, :fecha, :nombres, :apellidos, :correo, :telefono, :celular, :direccion, :tipoSolicitante, :observacion, :area, :userCreate)';
        $params = [
            'cedula' => $solicitud->getCedula(),
            'fecha' => $solicitud->getFechaPrestamo(),
            'nombres' => $solicitud->getNombres(),
            'apellidos' => $solicitud->getApellidos(),
            'correo' => $solicitud->getCorreo(),
            'telefono' => $solicitud->getTelefono(),
            'celular' => $solicitud->getCelular(),
            'direccion' => $solicitud->getDireccion(),
            'tipoSolicitante' => $solicitud->getIdTipoSolicitante(),
            'observacion' => $solicitud->getObservacionPrestamo(),
            'area' => $solicitud->getIdArea(),
            'userCreate' => $solicitud->getUsuarioIngreso()            
        ];
        
        $this->bd->execute($sql, $params);
        $rsp = $this->bd->lastInsertId();
        
        return $rsp;        
    }

    public function leer(int $id, int $estado) {
        $sql = 'CALL SpConsPrestamo(:id, :estado)';
        $params = [
            'id' => $id,
            'estado' => $estado
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Solicitud()));
        return $rsp[0];              
    }

    public function modificar(Solicitud $solicitud) {
        $sql = 'CALL SpUpdSolicitud(:id, :cedula, :fecha, :nombres, :apellidos, :correo, :telefono, :celular, :direccion, :tipoSolicitante, :observacion, :area, :userUpdate)';
        $params = [
            'id' => $solicitud->getId(),
            'cedula' => $solicitud->getCedula(),
            'fecha' => $solicitud->getFechaPrestamo(),
            'nombres' => $solicitud->getNombres(),
            'apellidos' => $solicitud->getApellidos(),
            'correo' => $solicitud->getCorreo(),
            'telefono' => $solicitud->getTelefono(),
            'celular' => $solicitud->getCelular(),
            'direccion' => $solicitud->getDireccion(),
            'tipoSolicitante' => $solicitud->getIdTipoSolicitante(),
            'observacion' => $solicitud->getObservacionPrestamo(),
            'area' => $solicitud->getIdArea(),
            'userUpdate' => $solicitud->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;         
    }

    
    public function aprobar(int $id, string $userUpdate) {
        $sql = 'CALL SpAprSolicitud(:id, :estado, :userUpdate)';
        $params = [
            'id' => $id,
            'estado' => 2,
            'userUpdate' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;         
    }
    
    
    public function cerrar(int $id, string $observacion, string $userUpdate) {
        $sql = 'CALL SpCerSolicitud(:id, :estado, :observacion, :userUpdate)';
        $params = [
            'id' => $id,
            'estado' => 3,
            'observacion' => $observacion,
            'userUpdate' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;         
    }    
    
    
}
?>