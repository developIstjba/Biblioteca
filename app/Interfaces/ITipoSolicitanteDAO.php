<?php

namespace app\Interfaces;

use app\DTO\TipoSolicitante;

/**
 *
 * @author Jonathan
 */
interface ITipoSolicitanteDAO extends IBaseDAO{

    public function guardar(TipoSolicitante $tipoSolicitante);
    
    public function modificar(TipoSolicitante $tipoSolicitante);
    
}

?>