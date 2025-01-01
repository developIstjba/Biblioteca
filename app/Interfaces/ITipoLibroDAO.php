<?php

namespace app\Interfaces;

use app\DTO\TipoLibro;

/**
 *
 * @author Jonathan
 */
interface ITipoLibroDAO extends IBaseDAO{

    public function guardar(TipoLibro $tipoLibro);
    
    public function modificar(TipoLibro $tipoLibro);
    
}

?>