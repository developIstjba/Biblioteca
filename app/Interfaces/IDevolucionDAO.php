<?php
namespace app\Interfaces;


use app\DTO\Devolucion;

/**
 *
 * @author Jonathan
 */
interface IDevolucionDAO extends IBaseDAO{

    public function guardar(Devolucion $devolucion);
    
    public function modificar(Devolucion $devolucion);
    
}

?>