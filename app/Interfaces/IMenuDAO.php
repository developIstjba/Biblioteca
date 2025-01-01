<?php
namespace app\Interfaces;


use app\DTO\Menu;

/**
 *
 * @author Jonathan
 */
interface IMenuDAO extends IBaseDAO{

    public function guardar(Menu $menu);
    
    public function modificar(Menu $menu);
    
}

?>