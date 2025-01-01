<?php
namespace app\Interfaces;

use app\DTO\Usuario;

/**
 *
 * @author Jonathan
 */
interface IUsuarioDAO extends IBaseDAO{

    public function guardar(Usuario $usuario);
    
    public function modificar(Usuario $usuario);
    
}

?>