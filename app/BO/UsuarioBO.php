<?php

namespace app\BO;

use app\Core\Filter;
use app\Core\Hash;
use app\Core\Response;
use app\Core\Session;
use app\DAO\UsuarioDAO;
use app\DTO\Usuario;
use app\Mappers\UserLoginMapper;
use app\Mappers\UsuarioMapper;
use app\Models\UserLoginModel;
use app\Models\UsuarioModel;

/**
 * Description of Usuario
 *
 * @author Jonathan
 */
class UsuarioBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct(){

        $this->dao = new UsuarioDAO();
        $this->dto = new Usuario();
        $this->model = new UsuarioModel();
        $this->mapper = new UsuarioMapper();   

    }


    public function login($username, $password){

        $rsp = new Response();
        if(Filter::hasValue($username)){
            
            if(Filter::hasValue($password)){
                
                $this->dto = $this->dao->getByUsername($username);
                if(!is_null($this->dto)){
                    $rsp = $this->validatePassword($password, $this->dto->getPassword());
                    $userLoginMapper = new UserLoginMapper();             
                    $rsp->setData($userLoginMapper->getModel($this->dto));
                    $rsp->setRoute('home/dashboard');
                    $rsp->setCode(600);                    
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Usuario y/o contraseña incorrectos.');                      
                }

            }else{
                $rsp->setType('error');
                $rsp->setMessage('Por favor, ingrese su contraseña.');            
            }
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Por favor, ingrese su usuario.');                  
        }      
        return $rsp;

    }


    private function validatePassword($password, $passwordRegister) {
         
        $rsp = new Response();
        if(Hash::verify($password, $passwordRegister)){
            $rsp->setType('success');
            $rsp->setRoute('Usuario y contraseña correctos.');
            
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Usuario y/o contraseña incorrectos.');
        }   

        return $rsp;

    }

    public function updateProfile(UserLoginModel $modelo){

        $ex = new Response();
        if($modelo->getPrimerNombre() && $modelo->getPrimerApellido() && $modelo->getSegundoApellido() &&
                $modelo->getCorreo() && $modelo->getCelular() && $modelo->getDireccion()){
                $userLoginMapper = new UserLoginMapper();    
                $this->dto = $userLoginMapper->getDTO($modelo);
                $rsp = $this->dao->updateProfile($this->dto);
                if($rsp){
                    Session::update('userlogin', $modelo);
                    $ex->setType('success');
                    $ex->setMessage('Los datos fueron actualizados.'); 
                    
                }else{
                    $ex->setType('error');
                    $ex->setMessage('Problemas al guardar los datos.');                     

                }            
        }else{
            $ex->setType('error');
            $ex->setMessage('Por favor, ingrese los campos obligatorios.');                 
        }           

        return $ex;
    }


    public function changePassword($username, $password, $newPassword, $confirmPassword) {
        
        $rsp = new Response();
        if(Filter::hasValue($password) && Filter::hasValue($newPassword) && Filter::hasValue($confirmPassword)){               
            
            $this->dto = $this->dao->getByUsername($username);
            $rsp = $this->validatePassword($password, $this->dto->getPassword());
            if($rsp->getType() == 'success'){
                $rsp->setMessage('La contraseña es incorrecta.');
                $rsp = $this->comparePasswords($newPassword, $confirmPassword);
                if($rsp->getType() == 'success'){
                    
                    $this->dto->setPassword(Hash::generate($newPassword));
                    if($this->dao->changePassword($this->dto)){
                        $rsp->setType('success');
                        $rsp->setMessage('La contraseña fue actualizada.');                            
                    }else{  
                        $rsp->setType('error');
                        $rsp->setMessage('Problemas al guardar los datos.');                         
                    }                     
                }
            }
                        
        }else{
            $rsp->setType('error');
            $rsp->setMessage('Por favor, ingrese los campos obligatorios.');                        
        }
        return $rsp;

    }
    
    private function comparePasswords($newPassword, $confirmPassword){
        
        $rsp = new Response();
        if(Filter::hasValue($newPassword)){
            if(Filter::hasValue($confirmPassword)){
                if($newPassword === $confirmPassword){
                    $rsp->setType('success');
                    $rsp->setMessage('Las contraseñas son identicas.');

                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Las contraseñas no son identicas.');                                            
                }      
            }else{
                $rsp->setType('error');
                $rsp->setMessage('Por favor, confirme la contraseña del usuario.');               
            }            
        }else{
            
            $rsp->setType('error');
            $rsp->setMessage('Por favor, ingrese la contraseña del usuario.');               
        }
  
        return $rsp;
        
    }
    
    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
    
    public function save(UsuarioModel $modelo, $confirmPassword){
        
        $rsp = $modelo->isValid();     
        if($rsp->getType() == 'success'){
            
            $rsp = $this->comparePasswords($modelo->getPassword(), $confirmPassword);
            if($rsp->getType() == 'success'){
                $this->dto = $this->mapper->getDTO($modelo);
                $this->dto->setPassword(Hash::generate($confirmPassword));
                if($this->dao->guardar($this->dto)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');              
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Error al guardar los datos.');              
                }
            }

        }      
        return $rsp;
        
    }
    
    
    public function delete($id, $username){
        
        $rsp = new Response();
        if(Filter::isNumeric($id)){            
            $this->dao->eliminar($id, $username);
            $rsp->setType('success');
            $rsp->setMessage('El usuario fue eliminado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El usuario seleccionado no es válido.');             
        }
        return $rsp;
        
    }
    
    
    public function disable($id, $username){
        
        $rsp = new Response();
        if(Filter::isNumeric($id)){            
            $this->dto->setId($id);
            $this->dto->setEstado(2);
            $this->dto->setUsuarioModifica($username);

            $this->dao->cambiarEstado($this->dto);
            $rsp->setType('success');
            $rsp->setMessage('El usuario fue desactivado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El usuario seleccionado no es válido.');             
        }
        return $rsp;
        
    }
    
    
    public function enable($id, $username){
        
        $rsp = new Response();
        if(Filter::isNumeric($id)){            
            $this->dto->setId($id);
            $this->dto->setEstado(1);
            $this->dto->setUsuarioModifica($username);
            
            $this->dao->cambiarEstado($this->dto);
            $rsp->setType('success');
            $rsp->setMessage('El usuario fue activado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El usuario seleccionado no es válido.');             
        }
        return $rsp;
        
    }
    
    
    public function getById($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setType('success');
                    $rsp->setRoute('administracion/usuarioEdit');
                    $rsp->setCode(600);  
                    $rsp->setData($this->model);
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('El rol seleccionado no es válido.');             
                }
        }else{
            $rsp->setType('error');
            $rsp->setMessage('El rol seleccionado no es válido.');             
        }   
        return $rsp;
        
    }
    
    
    public function update(UsuarioModel $modelo, $newpassword=null, $confirmPassword=null){
        
        $rsp = $modelo->isValid();     
        if($rsp->getType() == 'success'){
            $this->dto = $this->mapper->getDTO($modelo);
            
            if(!is_null($newpassword) and !is_null($confirmPassword)){
                $rsp = $this->comparePasswords($newpassword, $confirmPassword);
                $this->dto->setPassword(Hash::generate($confirmPassword));
            }
            
            if($rsp->getType() === 'success'){
                if($this->dao->modificar($this->dto)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');              
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Error al guardar los datos.');              
                }
            }                
        }      
        return $rsp;
        
    }
    
    
    
    
    
}
?>