<?php
namespace app\Interfaces;


use app\DTO\Libro;

/**
 *
 * @author Jonathan
 */
interface ILibroDAO extends IBaseDAO{

    public function guardar(Libro $libro);
    
    public function modificar(Libro $libro);
    
}

?>