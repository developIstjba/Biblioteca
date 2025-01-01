<?php
namespace app\Interfaces;

/**
 *
 * @author Jonathan
 */
interface IBaseDAO {
    
    public function leer(int $id);
    
    public function listar();
    
    public function eliminar(int $id, string $userUpdate);
    
}

?>
