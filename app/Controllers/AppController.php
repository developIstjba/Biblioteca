<?php
namespace app\Controllers;

use app\BO\MenuBO;
use app\BO\SessionBO;
use app\BO\UsuarioBO;
use app\Core\Configuracion;
use app\Core\Controller;
use app\Core\Filter;
use app\Core\Navegation;
use app\Core\Session;
use app\Core\Token;

/**
 * Description of AppController
 *
 * @author Jonathan
 */
class AppController extends Controller{

    
    public function __construct() {
        
        parent::__construct();
        
    }

    
    public function login(){
        
        $this->updateRouteSessions();
        $this->disableRoute();
        $data = [
            'token' => Token::generate(),
            ];
        
        $this->view->render($this, 'login', $data);
        
    }
    
    
    public function recoverPassword(){
        
        $this->updateRouteSessions();
        $this->disableRoute();
        $data = [
            'token' => Token::generate(),
            ];
        $this->view->render($this, 'recoverPassword', $data);
        
    }
    
    
    public function validateAccess(){
        
        Token::verify(Filter::sanitize('token'));
        $username = Filter::sanitize('username');
        $password = Filter::sanitize('password');
        
        $usuario = new UsuarioBO();
        $rsp = $usuario->login($username, $password);
        
        if($rsp->getType() == 'success'){
            
            $userlogin = $rsp->getData();
            Session::update('userlogin', $userlogin);
            $menu = new MenuBO();
            Session::update('menu', $menu->getByRol($userlogin->getIdRol()));
            $confg = new Configuracion();
            Session::update('parametros', $confg->getParametros());
            $tksession = new SessionBO();
            $rspSession = $tksession->save($userlogin->getId());
            Session::update('tksession', $rspSession->getData());
        }
        

        echo json_encode($rsp);
   
    }
 
    
    public function logout(){

        $session = new SessionBO();
        
        if(!is_null(Session::getValue('tksession')) && !empty(Session::getValue('tksession'))){
            $tksession = Session::getValue('tksession');
            $session->delete($tksession->getToken());
            Session::finish();            
        }

        Navegation::redirect('app/login');

    }
    
    
}
?>