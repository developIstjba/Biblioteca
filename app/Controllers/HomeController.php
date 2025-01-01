<?php

namespace app\Controllers;

use app\BO\UsuarioBO;
use app\Core\Controller;
use app\Core\Filter;
use app\Core\Options;
use app\Core\Session;
use app\Core\Token;

/**
 * Description of HomeController
 *
 * @author Jonathan
 */
class HomeController extends Controller{


    public function __construct() {
        
        parent::__construct();
        
    }
    
    
    public function dashboard(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'tksession' => Session::getValue('tksession'),
            'tmsession' => date("d-m-Y (H:i:s)", Session::getValue('generated')),
        ];
        
        $this->view->render($this, 'dashboard', $data);
        
    }

   
    public function profile(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
        ];
        
        $this->view->render($this, 'profile', $data);
        
    }


    public function security(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
        ];
        
        $this->view->render($this, 'security', $data);        
    }
    
    
    public function updateProfile(){
        
        Token::verify(Filter::sanitize('token'));
      
        $modelo = Session::getValue('userlogin');
        $modelo->setPrimerNombre(Filter::sanitize('primerNombre'));
        $modelo->setSegundoNombre(Filter::sanitize('segundoNombre'));
        $modelo->setPrimerApellido(Filter::sanitize('primerApellido'));
        $modelo->setSegundoApellido(Filter::sanitize('segundoApellido'));
        $modelo->setCorreo(Filter::sanitize('correo'));
        $modelo->setTelefono(Filter::sanitize('telefono'));
        $modelo->setCelular(Filter::sanitize('celular'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        $usuario = new UsuarioBO();
        $rsp = $usuario->updateProfile($modelo);
        
        echo json_encode($rsp);
        
    }
  

    public function changePassword(){

        Token::verify(Filter::sanitize('token'));
        $password = Filter::sanitize('currentPassword');        
        $newPassword = Filter::sanitize('newPassword'); 
        $confirmPassword = Filter::sanitize('confirmPassword');
        $userlogin = Session::getValue('userlogin');
        $usuario = new UsuarioBO();
        $rsp = $usuario->changePassword($userlogin->getUsername(), $password, $newPassword, $confirmPassword);
        echo json_encode($rsp);
    }
    
    
}
?>