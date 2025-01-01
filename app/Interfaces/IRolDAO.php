<?php

namespace app\Interfaces;

use app\DTO\Rol;

/**
 *
 * @author Jonathan
 */
interface IRolDAO extends IBaseDAO{

    public function guardar(Rol $rol);
    
    public function modificar(Rol $rol);
    
}

?>