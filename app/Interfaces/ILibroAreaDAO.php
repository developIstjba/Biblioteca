<?php
namespace app\Interfaces;

use app\DTO\LibroArea;


/**
 *
 * @author Jonathan
 */
interface ILibroAreaDAO{

    public function guardar(LibroArea $detalle);
    
    public function modificar(LibroArea $detalle);
    
    public function listar(int $idLibro);
}

?>