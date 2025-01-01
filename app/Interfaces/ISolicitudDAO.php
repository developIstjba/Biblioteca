<?php
namespace app\Interfaces;

use app\DTO\Solicitud;

/**
 *
 * @author Jonathan
 */
interface ISolicitudDAO{

    public function guardar(Solicitud $Prestamo);
    
    public function modificar(Solicitud $Prestamo);
    
}

?>