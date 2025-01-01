<?php

namespace app\Interfaces;


use app\DTO\Session;

/**
 *
 * @author Jonathan
 */
interface ISessionDAO extends IBaseDAO{

    public function guardar(Session $tokenSession);
    
    public function modificar(Session $tokenSession);
    
}

?>