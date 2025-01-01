<?php
namespace app\Interfaces;

use app\DTO\DetalleSolicitud;


/**
 *
 * @author Jonathan
 */
interface IDetalleSolicitudDAO{

    public function guardar(DetalleSolicitud $solicitud);
    
    public function modificar(DetalleSolicitud $solicitud);
    
    public function listar(int $idSolicitud);
}

?>