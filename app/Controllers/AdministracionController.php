<?php

namespace app\Controllers;

use app\BO\MenuBO;
use app\BO\PermisoBO;
use app\BO\PrivilegioBO;
use app\BO\RolBO;
use app\BO\UsuarioBO;
use app\Core\Controller;
use app\Core\Filter;
use app\Core\Options;
use app\Core\Session;
use app\Core\Token;
use app\Models\PermisoModel;
use app\Models\RolModel;
use app\Models\UsuarioModel;

/**
 * Description of AdministracionController
 *
 * @author Jonathan
 */
class AdministracionController extends Controller{
    
    
    /*
     * Section Rol
     */
    
    public function rol(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $rol = new RolBO();
        $roles = $rol->getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'roles' => $roles,
        ];
        
        $this->view->render($this, 'rol', $data);
        
    }
    
    public function rolAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
        ];
        
        $this->view->render($this, 'rolAdd', $data);
        
    }      
    
    public function selectRol(){
        
        Token::verify(Filter::sanitize('token'));
        $rol = new RolBO();
        $rsp = $rol->getById($_POST['id']);
              
        Session::update('rol',$rsp->getData());
        echo json_encode($rsp);       
        
    }
    
    public function rolEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'rol' => Session::getValue('rol'),
        ];
        
        $this->view->render($this, 'rolEdit', $data);
        
    }      
    
    public function saveRol(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
      
        $modelo = new RolModel();
        $modelo->setNombre(Filter::sanitize('nombre'));
        $modelo->setDescripcion(Filter::sanitize('descripcion'));
        $modelo->setMnemonico(Filter::sanitize('mnemonico'));       
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        
        $rol = new RolBO();
        $rsp = $rol->save($modelo);
        echo json_encode($rsp);       
        
    }    
    
    public function updateRol(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin= Session::getValue('userlogin');
        
        $modelo = Session::getValue('rol');
        $modelo->setNombre(Filter::sanitize('nombre'));
        $modelo->setDescripcion(Filter::sanitize('descripcion'));
        $modelo->setMnemonico(Filter::sanitize('mnemonico')); 
        $modelo->setUsuarioModifica($userlogin->getUsername());
        
        $rol = new RolBO();
        $rsp = $rol->update($modelo);
        echo json_encode($rsp);        
        
    } 

    public function deleteRol(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');

        $rol = new RolBO();
        $rsp = $rol->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);        
        
    }         
    
    public function disableRol(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $rol= new RolBO();
        $rsp = $rol->disable($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);   
        
    } 
    
    public function enableRol(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        $rol= new RolBO();
        $rsp = $rol->enable($_POST['id'], $userlogin->getUsername());

        echo json_encode($rsp);        
        
    }     
    
    /*
     * End Section Rol
     */
    
    
    /*
     * Section Permiso
     */

    public function permiso(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $permiso = new PermisoBO();
        $permisos = $permiso->getAll();

        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'permisos' => $permisos,
        ];
        
        $this->view->render($this, 'permiso', $data);
        
    }
    
    public function permisoAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $rol = new RolBO();
        $privilegio = new PrivilegioBO();
        $opcion = new MenuBO();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'roles' => $rol->getAll(),
            'menus' => $opcion->getAll(),
            'privilegios' => $privilegio->getAll(),
        ];
        
        $this->view->render($this, 'permisoAdd', $data);
        
    }      
    
    
    public function selectPermiso(){
        
        Token::verify(Filter::sanitize('token'));
        $permiso = new PermisoBO();
        $rsp = $permiso->getById($_POST['id']);
              
        Session::update('permiso',$rsp->getData());
        echo json_encode($rsp);        
        
    }
    
    
    public function permisoEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $rol = new RolBO();
        $privilegio = new PrivilegioBO();
        $opcion = new MenuBO();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'roles' => $rol->getAll(),
            'menus' => $opcion->getAll(),
            'privilegios' => $privilegio->getAll(),
            'permiso' => Session::getValue('permiso'),
        ];
        
        $this->view->render($this, 'permisoEdit', $data);
        
    }      
    
    
    public function savePermiso(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
      
        $modelo = new PermisoModel();
        $modelo->setIdRol(Filter::sanitize('idRol'));
        $modelo->setIdMenu(Filter::sanitize('idMenu'));
        $modelo->setDescripcion(Filter::sanitize('descripcion'));
        $modelo->setIdPrivilegio(Filter::sanitize('privilegio'));       
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        
        $permiso = new PermisoBO();
        $rsp = $permiso->save($modelo);
        echo json_encode($rsp);    
        
    }    
    
    
    public function updatePermiso(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin= Session::getValue('userlogin');
        
        $modelo = Session::getValue('permiso');
        $modelo->setDescripcion(Filter::sanitize('descripcion'));
        $modelo->setIdPrivilegio(Filter::sanitize('privilegio'));  
        $modelo->setUsuarioModifica($userlogin->getUsername());
        
        $permiso = new PermisoBO();
        $rsp = $permiso->update($modelo);
        echo json_encode($rsp);            
        
    } 

    
    public function deletePermiso(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $permiso = new PermisoBO();
        $rsp = $permiso->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);          
        
    }

    /*
     * End Section Permiso
     */   
    
    /*
     * Section Usuario
     */

    public function usuario(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $usuario = new UsuarioBO();
        $usuarios = $usuario->getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'usuarios' => $usuarios,
        ];
        
        $this->view->render($this, 'usuario', $data);
        
    }
    
    public function usuarioAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $rol = new RolBO();
        $roles = $rol->getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'roles' => $roles,
        ];
        
        $this->view->render($this, 'usuarioAdd', $data);
        
    }      
    
    public function saveUsuario(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
      
        $modelo = new UsuarioModel();
        $modelo->setPrimerNombre(Filter::sanitize('primerNombre'));
        $modelo->setSegundoNombre(Filter::sanitize('segundoNombre'));
        $modelo->setPrimerApellido(Filter::sanitize('primerApellido'));
        $modelo->setSegundoApellido(Filter::sanitize('segundoApellido'));
        $modelo->setCedula(Filter::sanitize('cedula'));
        $modelo->setCorreo(Filter::sanitize('correo'));
        $modelo->setTelefono(Filter::sanitize('telefono'));
        $modelo->setCelular(Filter::sanitize('celular'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        $modelo->setUsername(Filter::sanitize('username'));
        $modelo->setPassword(Filter::sanitize('password')); 
        $modelo->setIdRol(Filter::sanitize('idRol'));
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        $confirmPassword = Filter::sanitize('confirmPassword');
        
        $usuario = new UsuarioBO();
        $rsp = $usuario->save($modelo, $confirmPassword);
        echo json_encode($rsp);       
        
    }    
    
    public function deleteUsuario(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $usuario = new UsuarioBO();
        $rsp = $usuario->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);     
        
    }         
    
    public function disableUsuario(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $usuario = new UsuarioBO();
        $rsp = $usuario->disable($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);          
        
    } 
    
    public function enableUsuario(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $usuario = new UsuarioBO();
        $rsp = $usuario->enable($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);           
        
    }     

    public function selectUsuario(){
        
        Token::verify(Filter::sanitize('token'));
        $usuario = new UsuarioBO();
        $rsp = $usuario->getById($_POST['id']);
              
        Session::update('usuario',$rsp->getData());
        echo json_encode($rsp);    
        
    }
    
    public function usuarioEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        $rol = new RolBO();
        $roles = $rol->getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'usuario' => Session::getValue('usuario'),
            'roles' => $roles,
        ];
        
        $this->view->render($this, 'usuarioEdit', $data);
        
    }
    
    public function updateUsuario(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('usuario');
        $modelo->setCedula(Filter::sanitize('cedula'));        
        $modelo->setPrimerNombre(Filter::sanitize('primerNombre'));
        $modelo->setSegundoNombre(Filter::sanitize('segundoNombre'));
        $modelo->setPrimerApellido(Filter::sanitize('primerApellido'));
        $modelo->setSegundoApellido(Filter::sanitize('segundoApellido'));
        $modelo->setCorreo(Filter::sanitize('correo'));
        $modelo->setTelefono(Filter::sanitize('telefono'));
        $modelo->setCelular(Filter::sanitize('celular'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        $modelo->setUsername(Filter::sanitize('username'));
        $modelo->setIdRol(Filter::sanitize('idRol'));
        $modelo->setUsuarioModifica($userlogin->getUsername());
        $newPassword = Filter::sanitize('password'); 
        $confirmPassword = Filter::sanitize('confirmPassword');   
        $resetPassword = Filter::sanitize('resetPassword');   
        
        $usuario = new UsuarioBO();
        if($resetPassword == 1){
            $rsp = $usuario->update($modelo, $newPassword, $confirmPassword);
        }else{
            $rsp = $usuario->update($modelo);
        }
        
        echo json_encode($rsp);        
        
    } 

    /*
     * End Section Usuario
     */
    
    


    
}


?>