<?php
namespace app\Interfaces;


use app\DTO\Editorial;

/**
 *
 * @author Jonathan
 */
interface IEditorialDAO extends IBaseDAO{

    public function guardar(Editorial $editorial);
    
    public function modificar(Editorial $editorial);
    
}

?>