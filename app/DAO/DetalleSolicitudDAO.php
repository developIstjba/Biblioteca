<?php

namespace app\DAO;

use app\DTO\DetalleSolicitud;
use app\Interfaces\IDetalleSolicitudDAO;

/**
 * Description of TipoLibroDAO
 *
 * @author Jonathan
 */
class DetalleSolicitudDAO extends BaseDAO implements IDetalleSolicitudDAO{
    
    public function leer(int $idSolicitud, int $idLibro, $estado = null){
        $sql = 'CALL SpConsDetalleSolicitud(:idSolicitud, :idLibro, :estado)';
        $params = [
            'idSolicitud' => $idSolicitud,
            'idLibro' => $idLibro,
            'estado' => $estado
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new DetalleSolicitud()));
        return $rsp;
    }

    public function listar(int $idSolicitud){
        $sql = 'CALL SpConsDetalleSolicitud(:idSolicitud, :idLibro, :estado)';
        $params = [
            'idSolicitud' => $idSolicitud,
            'idLibro' => null,
            'estado' => 1
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new DetalleSolicitud()));
        return $rsp;
    }
    
    public function Eliminar(int $idSolicitud, string $userDelete) {
        $sql = 'CALL SpDelDetalleSolicitud(:idSolicitud, :userDelete)';
        $params = [
            'idSolicitud' => $idSolicitud,
            'userDelete' => $userDelete
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;          
    }

    public function guardar(DetalleSolicitud $detalle) {
        $sql = 'CALL SpInsDetalleSolicitud(:idSolicitud, :idLibro, :userCreate)';
        $params = [
            'idSolicitud' => $detalle->getIdSolicitud(),
            'idLibro' => $detalle->getIdLibro(),
            'userCreate' => $detalle->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
    }

    public function modificar(DetalleSolicitud $detalle) {
        $sql = 'CALL SpUpdDetalleSolicitud(:idSolicitud, :idLibro, :estado, :userUpdate)';
        $params = [
            'idSolicitud' => $detalle->getIdSolicitud(),
            'idLibro' => $detalle->getIdLibro(),
            'estado' => $detalle->getEstadoAuditoria(),
            'userUpdate' => $detalle->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;          
    }

}
?>