<?php
namespace app\Interfaces;

use app\DTO\Autor;


/**
 *
 * @author Jonathan
 */
interface IAutorDAO extends IBaseDAO{

    public function guardar(Autor $autor);
    
    public function modificar(Autor $autor);
    
}

?>