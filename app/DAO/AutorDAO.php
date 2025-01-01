<?php

namespace app\DAO;

use app\Interfaces\IAutorDAO;
use app\DTO\Autor;

/**
 * Description of AutorDAO
 *
 * @author Jonathan
 */
class AutorDAO extends BaseDAO implements IAutorDAO{
    
    public function listar(){
        $sql = 'CALL SpConsAutor(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Autor()));
        return $rsp;
    }  

    public function guardar(Autor $autor){
        $sql = 'CALL SpInsAutor(:primernombre, :segundonombre, :primerapellido, :segundoapellido, :corporativo, :nombrecorporativo, :usercreate)';
        $params = [
            'primernombre' => $autor->getPrimerNombre(),
            'segundonombre' => $autor->getSegundoNombre(),
            'primerapellido' => $autor->getPrimerApellido(),    
            'segundoapellido' => $autor->getSegundoApellido(),
            'corporativo' => $autor->getCorporativo()?? 0,
            'nombrecorporativo' => $autor->getNombreCorporativo(),
            'usercreate' => $autor->getUsuarioIngreso()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }  

    
    public function modificar(Autor $autor){
        $sql = 'CALL SpUpdAutor(:id, :primernombre, :segundonombre, :primerapellido, :segundoapellido, :corporativo, :nombrecorporativo, :userupdate)';
        $params = [
            'id' => $autor->getId(),
            'primernombre' => $autor->getPrimerNombre(),
            'segundonombre' => $autor->getSegundoNombre(),
            'primerapellido' => $autor->getPrimerApellido(),    
            'segundoapellido' => $autor->getSegundoApellido(),
            'corporativo' => $autor->getCorporativo(),
            'nombrecorporativo' => $autor->getNombreCorporativo(),
            'userupdate' => $autor->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }  
    
    
    public function eliminar(int $id, string $userUpdate){
        $sql = 'CALL SpDelAutor(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }
    

    public function leer(int $id) {
        $sql = 'CALL SpConsAutor(:id)';
        $params = [
            'id' => $id
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Autor()));
        return $rsp[0];        
    }

}
?>