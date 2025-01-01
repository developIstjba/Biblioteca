<?php
namespace app\Interfaces;

use app\DTO\LibroAutor;


/**
 *
 * @author Jonathan
 */
interface ILibroAutorDAO{

    public function guardar(LibroAutor $libro);
    
    public function modificar(LibroAutor $libro);
    
    public function listar(int $idLibro);
}

?>