<?php

namespace app\Controllers;

use app\BO\CategoriaBO;
use app\BO\AutorBO;
use app\BO\EditorialBO;
use app\BO\LibroAreaBO;
use app\BO\LibroAutorBO;
use app\BO\LibroBO;
use app\BO\TipoLibroBO;
use app\Core\Archivo;
use app\Core\Controller;
use app\Core\Filter;
use app\Core\Options;
use app\Core\Session;
use app\Core\Token;
use app\Models\AutorModel;
use app\Models\EditorialModel;
use app\Models\LibroModel;

/**
 * Description of BookController
 *
 * @author Jonathan
 */
class BibliotecaController extends Controller{
    
    
    public function __construct() {
        
        parent::__construct();
        
    }

    /*
     * Section Editorial
     */    
    public function editorial(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $editorial = new EditorialBO();
        $editoriales = $editorial->getAll();
            
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'editoriales' => $editoriales,
        ];
        
        $this->view->render($this, 'editorial', $data);
        
    }  
    
    
    public function editorialAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu']
        ];
        
        $this->view->render($this, 'editorialAdd', $data);
        
    }      
    
    
    public function selectEditorial(){
        
        Token::verify(Filter::sanitize('token'));
        $editorial = new EditorialBO();
        $rsp = $editorial->getById($_POST['id']);
              
        Session::update('editorial',$rsp->getData());
        echo json_encode($rsp); 
        
    }
    
    
    public function editorialEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'editorial' => Session::getValue('editorial'),
        ];
        
        $this->view->render($this, 'editorialEdit', $data);
        
    }      
    
    
    public function saveEditorial(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin= Session::getValue('userlogin');
      
        $modelo = new EditorialModel();
        $modelo->setNombre(Filter::sanitize('nombre'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        
        $editorial = new EditorialBO();
        $rsp = $editorial->save($modelo);
        echo json_encode($rsp); 
        
    }    
    
    
    public function updateEditorial(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('editorial');
        $modelo->setNombre(Filter::sanitize('nombre'));
        $modelo->setDireccion(Filter::sanitize('direccion'));
        $modelo->setUsuarioModifica($userlogin->getUsername());
        
        $editorial = new EditorialBO();
        $rsp = $editorial->update($modelo);
        echo json_encode($rsp);      
        
    } 

    
    public function deleteEditorial(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');

        $editorial = new EditorialBO();
        $rsp = $editorial->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);         
        
    } 
    /*
     * End Section Editorial
     */    
    
    
    /*
     * Section Autor
     */
    public function autor(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $autor = new AutorBO();
        $autores = $autor->getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'autores' => $autores,
        ];
        
        $this->view->render($this, 'autor', $data);
        
    }
    

    public function autorAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();

        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu']
        ];
        
        $this->view->render($this, 'autorAdd', $data);
        
    }      
    
    
    public function selectAutor(){
        
        Token::verify(Filter::sanitize('token'));
        $autor = new AutorBO();
        $rsp = $autor->getById($_POST['id']);
              
        Session::update('autor',$rsp->getData());
        echo json_encode($rsp);            
        
    }
    
    
    public function autorEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'autor' => Session::getValue('autor'),
        ];
        
        $this->view->render($this, 'autorEdit', $data);
        
    }      
    

    public function autorCorporativoEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'autor' => Session::getValue('autor'),
        ];
        
        $this->view->render($this, 'autorCorporativoEdit', $data);
        
    }
    
    public function saveAutor(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
      
        $modelo = new AutorModel();
        $modelo->setPrimerNombre(Filter::sanitize('primerNombre'));
        $modelo->setSegundoNombre(Filter::sanitize('segundoNombre'));
        $modelo->setPrimerApellido(Filter::sanitize('primerApellido'));
        $modelo->setSegundoApellido(Filter::sanitize('segundoApellido'));
        $modelo->setCorporativo(Filter::sanitize('corporativo'));
        $modelo->setNombreCorporativo(Filter::sanitize('nombreCorporativo'));        
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        
        $autor = new AutorBO();
        $rsp = $autor->save($modelo);
        echo json_encode($rsp);       
        
    }    
    
    
    public function updateAutor(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('autor');
        $modelo->setPrimerNombre(Filter::sanitize('primerNombre'));
        $modelo->setSegundoNombre(Filter::sanitize('segundoNombre'));
        $modelo->setPrimerApellido(Filter::sanitize('primerApellido'));
        $modelo->setSegundoApellido(Filter::sanitize('segundoApellido'));
        $modelo->setCorporativo(0);
        $modelo->setUsuarioModifica($userlogin->getUsername());
        
        $autor = new AutorBO();
        $rsp = $autor->update($modelo);
        echo json_encode($rsp);       
        
    } 

    
    public function updateAutorCorporativo(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('autor');
        $modelo->setCorporativo(1);
        $modelo->setNombreCorporativo(Filter::sanitize('nombreCorporativo')); 
        $modelo->setUsuarioModifica($userlogin->getUsername());
        
        $autor = new AutorBO();
        $rsp = $autor->update($modelo);
        echo json_encode($rsp);         
        
    }
    
    
    public function deleteAutor(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $autor = new AutorBO();
        $rsp = $autor->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);      
        
    }     
    /*
     * End Section Autor
     */
    
    
    
    
    /*
     * Section Libro
     */
    
    public function libro(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $libro = new LibroBO();
        $libros = $libro->getAll();
        $privilegio = $this->getAccessLevel($menu['submenu'], 'BIBLIB');
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'libros' => $libros,
            'privilegio' =>  $privilegio,
        ];
        $this->view->render($this, 'libro', $data);
        
    }
    
    public function libroAdd(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $editorial = new EditorialBO();
        $autor = new AutorBO();
        $tipolibro = new TipoLibroBO();         
        $area = new CategoriaBO(); 

        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'tiposlibros' => $tipolibro->getAll(),
            'editoriales' => $editorial->getAll(),
            'autores' => $autor->getAll(),            
            'areas' => $area->getAll(),
        ];
        $this->view->render($this, 'libroAdd', $data);
        
    }      
    
    
    public function saveLibro(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
      
        $modelo = new LibroModel();
        $modelo->setCodigo(Filter::sanitize('codigo'));
        $modelo->setTitulo(Filter::sanitize('titulo'));
        $modelo->setAnio(Filter::sanitize('anio'));
        $modelo->setPais(Filter::sanitize('pais'));
        $modelo->setIdTipo(Filter::sanitize('tipo'));
        $modelo->setIdEditorial(Filter::sanitize('editorial'));
        $modelo->setCopias(Filter::sanitize('copias')); 
        $modelo->setIsbn(Filter::sanitize('isbn'));
        $modelo->setUrl(Filter::sanitize('url'));
        $modelo->setPortada(Filter::isImage('portada'));
        $modelo->setUsuarioIngreso($userlogin->getUsername());
        $modelo->setAutores(isset($_POST['autor']) ? $_POST['autor'] : []);
        $modelo->setAreas(isset($_POST['area']) ? $_POST['area'] : []);
        
        $file = new Archivo();
        $modelo->setPortada($file->upload(Filter::isImage('portada') ? $_FILES['portada'] : null));        
        
        $libro = new LibroBO();
        $rsp = $libro->save($modelo);
        echo json_encode($rsp);       
        
    }    
    

    public function selectLibro(){
        
        Token::verify(Filter::sanitize('token'));
        $libro = new LibroBO();
        $areas = new LibroAreaBO();
        $autores = new LibroAutorBO();
        
        $rsp = $libro->getById($_POST['id']);
        $rspAreas = $areas->getAll($_POST['id']);
        $rspAutores = $autores->getAll($_POST['id']);
              
        Session::update('libro',$rsp->getData());
        Session::update('listAreas',$rspAreas);
        Session::update('listAutores',$rspAutores);
        echo json_encode($rsp);
        
    }
    
    
    public function libroEdit(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        $editorial = new EditorialBO();
        $autor = new AutorBO();
        $tipolibro = new TipoLibroBO();         
        $area = new CategoriaBO();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'libro' => Session::getValue('libro'),
            'listAreas' => Session::getValue('listAreas'),
            'listAutores' => Session::getValue('listAutores'),
            'tiposlibros' => $tipolibro->getAll(),
            'editoriales' => $editorial->getAll(),
            'autores' => $autor->getAll(),            
            'areas' => $area->getAll(),            
        ];
        
        $this->view->render($this, 'libroEdit', $data);
        
    }          
    
    public function updateLibro(){
        
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $modelo = Session::getValue('libro');
        $modelo->setCodigo(Filter::sanitize('codigo'));
        $modelo->setTitulo(Filter::sanitize('titulo'));
        $modelo->setAnio(Filter::sanitize('anio'));
        $modelo->setPais(Filter::sanitize('pais'));
        $modelo->setIdTipo(Filter::sanitize('tipo'));
        $modelo->setIdEditorial(Filter::sanitize('editorial'));
        $modelo->setCopias(Filter::sanitize('copias')); 
        $modelo->setIsbn(Filter::sanitize('isbn'));
        $modelo->setUrl(Filter::sanitize('url'));
        $modelo->setPortada(Filter::isImage('portada'));
        $modelo->setUsuarioModifica($userlogin->getUsername());
        $modelo->setAutores(isset($_POST['autor']) ? $_POST['autor'] : []);
        $modelo->setAreas(isset($_POST['area']) ? $_POST['area'] : []);

        $file = new Archivo();
        $modelo->setPortada($file->upload(Filter::isImage('portada') ? $_FILES['portada'] : null));      
        
        $libro = new LibroBO();
        $rsp = $libro->update($modelo);
        echo json_encode($rsp);      
        
    } 

    
    public function deleteLibro(){
       
        Token::verify(Filter::sanitize('token'));
        $userlogin = Session::getValue('userlogin');
        
        $libro = new LibroBO();
        $rsp = $libro->delete($_POST['id'], $userlogin->getUsername());
        echo json_encode($rsp);         
        
    }     
    
    
    
    public function viewLibro(){
        
        Token::verify(Filter::sanitize('token'));
        $libro = new LibroBO();
        $areas = new LibroAreaBO();
        $autores = new LibroAutorBO();
        
        $rsp = $libro->getDetail($_POST['id']);
        $rspAreas = $areas->getAll($_POST['id']);
        $rspAutores = $autores->getAll($_POST['id']);
              
        Session::update('libro',$rsp->getData());
        Session::update('areas',$rspAreas);
        Session::update('autores',$rspAutores);
        echo json_encode($rsp);
        
    }
    
    
    public function libroDetalle(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'libro' => Session::getValue('libro'),
            'areas' => Session::getValue('areas'),
            'autores' => Session::getValue('autores'),           
        ];
        
        $this->view->render($this, 'libroDetalle', $data);
        
    } 
    
    
    
    /*
     * End Section Libro
     */
    
    /*
     * Section Tesis
     */

    
    public function proyecto(){
        
        $this->updateRouteSessions();
        $this->validateSession();
        $menu = Options::getAll();
        
        $libro = new LibroBO();
        $libros = $libro->getAll();
        $privilegio = $this->getAccessLevel($menu['submenu'], 'BIBLIB');
        
        $data = [
            'token' => Token::generate(),
            'userlogin' => Session::getValue('userlogin'),
            'mainmenu' => $menu['mainmenu'],
            'submenu' => $menu['submenu'],
            'libros' => $libros,
            'privilegio' =>  $privilegio,
        ];
        $this->view->render($this, 'libro', $data);
        
    }
    

    
}
?>