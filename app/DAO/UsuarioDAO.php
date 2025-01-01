<?php

namespace app\DAO;

use app\Interfaces\IUsuarioDAO;
use app\DTO\Usuario;

/**
 * Description of Usuario
 *
 * @author Jonathan
 */
class UsuarioDAO extends BaseDAO implements IUsuarioDAO{
    
    
    public function getByUsername($username){
        $sql = 'CALL SpConsUsuarioLogin(:username)';
        $params = [
            'username' => $username
        ];
        $rsp = $this->bd->select($sql, $params, get_class(new Usuario()));
        return (isset($rsp[0]) ? $rsp[0] : null);
    }


    public function updateProfile(Usuario $usuario){
        $sql = 'CALL SpUpdateProfile(:username, :primerNombre, :segundoNombre, :primerApellido, :segundoApellido, :correo, :telefono, :celular, :direccion, :usuarioModifica)';
        $params = [
            'username' => $usuario->getUsername(),
            'primerNombre' => $usuario->getPrimerNombre(),
            'segundoNombre' => $usuario->getSegundoNombre(),
            'primerApellido' => $usuario->getPrimerApellido(),            
            'segundoApellido' => $usuario->getSegundoApellido(),
            'correo' => $usuario->getCorreo(),
            'telefono' => $usuario->getTelefono(),
            'celular' => $usuario->getCelular(),
            'direccion' => $usuario->getDireccion(),
            'usuarioModifica' => $usuario->getUsuarioModifica()            
        ];
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }    
    
    
    public function changePassword(Usuario $usuario){
        $sql = 'CALL SpChangePassword(:username, :newpassword, :usuarioModifica)';
        $params = [
            'username' => $usuario->getUsername(),
            'newpassword' => $usuario->getPassword(),
            'usuarioModifica' => $usuario->getUsername()
        ];
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }    
    
    
    public function listar(){
        $sql = 'CALL SpConsUsuario(:id)';
        $params = [
            'id' => null
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Usuario()));
        return $rsp;
    } 
    
    
    public function guardar($usuario){
        $sql = 'CALL SpInsUsuario(:idrol, :cedula, :primerNombre, :segundoNombre, :primerApellido, :segundoApellido, :correo, :telefono, :celular, :direccion, :username, :clave, :usercreate)';
        $params = [
            'idrol' => $usuario->getIdRol(),
            'cedula' => $usuario->getCedula(),
            'primerNombre' => $usuario->getPrimerNombre(),
            'segundoNombre' => $usuario->getSegundoNombre(),
            'primerApellido' => $usuario->getPrimerApellido(),            
            'segundoApellido' => $usuario->getSegundoApellido(),
            'correo' => $usuario->getCorreo(),
            'telefono' => $usuario->getTelefono(),
            'celular' => $usuario->getCelular(),
            'direccion' => $usuario->getDireccion(),
            'username' => $usuario->getUsername(),
            'clave' => $usuario->getPassword(),          
            'usercreate' => $usuario->getUsuarioIngreso()   
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;
    }  

    
    public function modificar($usuario){
        $sql = 'CALL SpUpdUsuario(:id, :idrol, :cedula, :primerNombre, :segundoNombre, :primerApellido, :segundoApellido, :correo, :telefono, :celular, :direccion, :username, :clave, :userUpdate)';
        $params = [
            'id' => $usuario->getId(),
            'idrol' => $usuario->getIdRol(),
            'cedula' => $usuario->getCedula(),
            'primerNombre' => $usuario->getPrimerNombre(),
            'segundoNombre' => $usuario->getSegundoNombre(),
            'primerApellido' => $usuario->getPrimerApellido(),            
            'segundoApellido' => $usuario->getSegundoApellido(),
            'correo' => $usuario->getCorreo(),
            'telefono' => $usuario->getTelefono(),
            'celular' => $usuario->getCelular(),
            'direccion' => $usuario->getDireccion(),
            'username' => $usuario->getUsername(),
            'clave' => $usuario->getPassword(),       
            'userUpdate' => $usuario->getUsuarioModifica() 
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }  
    
    
    public function eliminar(int $id, string $userUpdate){
        $sql = 'CALL SpDelUsuario(:id, :userdelete)';
        $params = [
            'id' => $id,
            'userdelete' => $userUpdate
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }    
    
    
    public function CambiarEstado(Usuario $usuario){
        $sql = 'CALL SpChaStaUsuario(:id, :estado, :userupdate)';
        $params = [
            'id' => $usuario->getId(),
            'estado' => $usuario->getEstado(),
            'userupdate' => $usuario->getUsuarioModifica()
        ];
        
        $rsp = $this->bd->execute($sql, $params);
        return $rsp;        
        
    }
    

    public function Leer(int $id) {
        $sql = 'CALL SpConsUsuario(:id)';
        $params = [
            'id' => $id
        ];
        
        $rsp = $this->bd->select($sql, $params, get_class(new Usuario()));
        return $rsp[0];
    }

}
?>