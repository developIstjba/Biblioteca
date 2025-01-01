<?php
namespace app\Interfaces;


use app\DTO\Permiso;

/**
 *
 * @author Jonathan
 */
interface IPermisoDAO extends IBaseDAO{

    public function guardar(Permiso $permiso);
    
    public function modificar(Permiso $permiso);
    
}

?>