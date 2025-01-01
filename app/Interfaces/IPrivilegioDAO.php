<?php
namespace app\Interfaces;


use app\DTO\Privilegio;

/**
 *
 * @author Jonathan
 */
interface IPrivilegioDAO extends IBaseDAO{

    public function guardar(Privilegio $Privilegio);
    
    public function modificar(Privilegio $Privilegio);
    
}

?>