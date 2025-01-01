<?php

namespace app\Controllers;

use app\BO\CarreraBO;
use app\BO\DetalleSolicitudBO;
use app\BO\LibroBO;
use app\BO\SolicitudBO;
use app\BO\TipoSolicitanteBO;
use app\Core\Controller;
use app\Core\Filter;
use app\Core\Options;
use app\Core\PDF;
use app\Core\Session;
use app\Core\Token;
use app\Models\SolicitudModel;

/**
 * Description of SolicitudController
 *
 * @author Jonathan
 */
class SolicitudController extends Controller{
    

    public function __construct() {
        
        parent::__construct();
        
    }

    
    public function elaborada(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $prestamo = new SolicitudBO();
        $solicitudes = $prestamo->getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'solicitudes' => $solicitudes
        ];
        
        $this->view->render($this, 'prestamo', $data);
        
    }
    
    
    public function prestamoAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $libro = new LibroBO();
        $areas = new CarreraBO(); 
        $tipoSolicitante = new TipoSolicitanteBO();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'libros' => $libro->getDisponibles(),
            'areas' => $areas->getAll(),
            'tiposolicitante' => $tipoSolicitante->getAll(),
        ];
        
        $this->view->render($this, 'prestamoAdd', $data);
        
    } 
    
    public function savePrestamo(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin= Session::getValue('userlogin');
        
        $modelo = new SolicitudModel();
        $modelo->setCedula(Filter::sanitize('cedula'));
        $horaActual = date("H:i:s", time());
        $fechaPrestamo = Filter::sanitize('fechaPrestamo');
        $modelo->setFechaPrestamo($fechaPrestamo." ".$horaActual);
        $modelo->setNombres(Filter::sanitize('nombres'));
        $modelo->setApellidos(Filter::sanitize('apellidos'));
        $modelo->setCorreo(Filter::sanitize('correo'));
        $modelo->setTelefono(Filter::sanitize('telefono'));
        $modelo->setCelular(Filter::sanitize('celular'));
        $modelo->setObservacionPrestamo(Filter::sanitize('observacion'));
        $modelo->setIdTipoSolicitante(Filter::sanitize('tiposolicitante'));
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        $modelo->setLibros(isset($_POST['libro']) ? $_POST['libro'] : []);
        $modelo->setIdArea(Filter::sanitize('carrera'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        $solicitud = new SolicitudBO();
        $rsp = $solicitud->save($modelo);
        echo json_encode($rsp);
        
        
    }     
    

    public function selectPrestamo(){
        
        Token::verify(Filter::sanitize('token'));
        $solicitud = new SolicitudBO();
        $detalle= new DetalleSolicitudBO();
        
        $rsp = $solicitud->getById($_POST['id']);
        $rspDetalle = $detalle->getAll($_POST['id']);
              
        Session::update('solicitud',$rsp->getData());
        Session::update('detalle',$rspDetalle);
        echo json_encode($rsp);

    }
    
    
    public function prestamoEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $solicitud = new SolicitudBO();
        $libro = new LibroBO();
        $areas = new CarreraBO(); 
        $tipoSolicitante = new TipoSolicitanteBO();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'solicitud' => Session::getValue('solicitud'),
            'detalle' => Session::getValue('detalle'),
            'areas' => $areas->getAll(),
            'libros' => $solicitud->getListLibroSelect($libro->getDisponibles(), Session::getValue('detalle')),
            'tiposolicitante' => $tipoSolicitante->getAll()          
        ];
        
        $this->view->render($this, 'prestamoEdit', $data);
        
    }          
    
    public function updateSolicitud(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('solicitud');
        $modelo->setCedula(Filter::sanitize('cedula'));
        $horaActual = date("H:i:s", time());
        $fechaPrestamo = Filter::sanitize('fechaPrestamo');
        $modelo->setFechaPrestamo($fechaPrestamo." ".$horaActual);
        $modelo->setNombres(Filter::sanitize('nombres'));
        $modelo->setApellidos(Filter::sanitize('apellidos'));
        $modelo->setCorreo(Filter::sanitize('correo'));
        $modelo->setTelefono(Filter::sanitize('telefono'));
        $modelo->setCelular(Filter::sanitize('celular'));
        $modelo->setObservacionPrestamo(Filter::sanitize('observacion'));
        $modelo->setIdTipoSolicitante(Filter::sanitize('tiposolicitante'));
        $modelo->setUsuarioModifica($userlogin->getUsername());
        $modelo->setLibros(isset($_POST['libro']) ? $_POST['libro'] : []);     
        $modelo->setIdArea(Filter::sanitize('carrera'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        
        $solicitud = new SolicitudBO();
        $rsp = $solicitud->update($modelo);
        echo json_encode($rsp);      
        
    } 

    
    public function deleteSolicitud(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $solicitud = new SolicitudBO();
        $rsp = $solicitud->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);         
        
    }       
    
    
    public function aprobarSolicitud(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $solicitud = new SolicitudBO();
        $rsp = $solicitud->aprobar($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);         
        
    } 
    
    
    public function aprobada(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $solicitud = new SolicitudBO();
        $solicitudes = $solicitud->getByEstado(2);
        $parametros = Session::getValue('parametros');

        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'diasVencimiento' => $parametros['DCSOL'],
            'solicitudes' => $solicitudes
        ];
        
        $this->view->render($this, 'aprobada', $data);
        
    }
    
    
    
    public function cerrada(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $solicitud = new SolicitudBO();
        $solicitudes = $solicitud->getByEstado(3);
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'solicitudes' => $solicitudes
        ];
        
        $this->view->render($this, 'cerrada', $data);
        
    }

    public function selectSolicitud(){
        
        Token::verify(Filter::sanitize('token'));
        $solicitud = new SolicitudBO();
        $rsp = $solicitud->getByIdApprove($_POST['id']);    
              
        Session::update('solicitud',$rsp->getData());
        echo json_encode($rsp);

    }    

    
    public function aprobadaEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'solicitud' => Session::getValue('solicitud')        
        ];
        
        $this->view->render($this, 'aprobadaEdit', $data);
        
    }

    
    public function cerrarSolicitud(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('solicitud');
        $modelo->setObservacionCierre(Filter::sanitize('observacion')); 
        
        $solicitud = new SolicitudBO();
        $rsp = $solicitud->cerrar($modelo->getId(), $modelo->getObservacionCierre(), $userlogin->getUsername());
        echo json_encode($rsp);      
        
    } 
    
    
    public function aprobadaDetalle(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'solicitud' => Session::getValue('solicitud'),
            'detalle' => Session::getValue('detalle')
        ];
        
        $this->view->render($this, 'aprobadaDetalle', $data);
        
    }    
    

    public function cerradaDetalle(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'solicitud' => Session::getValue('solicitud'),
            'detalle' => Session::getValue('detalle')
        ];
        
        $this->view->render($this, 'cerradaDetalle', $data);
        
    } 

    public function viewSolicitud(){
        
        Token::verify(Filter::sanitize('token'));
        $solicitud = new SolicitudBO();
        $detalle= new DetalleSolicitudBO();
        
        $rsp = $solicitud->getByIdView($_POST['id'], 2, 'solicitud/aprobadaDetalle'); 
        $rspDetalle = $detalle->getAll($_POST['id']);
              
        Session::update('solicitud',$rsp->getData());
        Session::update('detalle',$rspDetalle);
        echo json_encode($rsp);
        
        
    }  


    public function viewSolicitudCerrada(){
        
        Token::verify(Filter::sanitize('token'));
        $solicitud = new SolicitudBO();
        $detalle= new DetalleSolicitudBO();
        
        $rsp = $solicitud->getByIdView($_POST['id'], 3, 'solicitud/cerradaDetalle'); 
        $rspDetalle = $detalle->getAll($_POST['id']);
              
        Session::update('solicitud',$rsp->getData());
        Session::update('detalle',$rspDetalle);
        echo json_encode($rsp);
        
        
    }    
    
    
    public function download(){
        
        $documento = new PDF(Session::getValue('solicitud'), Session::getValue('detalle'));
        $documento->generate();
        
    }     
    
    
    
}

?>