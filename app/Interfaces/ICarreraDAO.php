<?php
namespace app\Interfaces;

use app\DTO\Carrera;


/**
 *
 * @author Jonathan
 */
interface ICarreraDAO extends IBaseDAO{

    public function guardar(Carrera $area);
    
    public function modificar(Carrera $area);
    
}

?>