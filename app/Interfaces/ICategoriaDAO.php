<?php
namespace app\Interfaces;

use app\DTO\Categoria;


/**
 *
 * @author Jonathan
 */
interface ICategoriaDAO extends IBaseDAO{

    public function guardar(Categoria $area);
    
    public function modificar(Categoria $area);
    
}

?>