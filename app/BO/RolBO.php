<?php

namespace app\BO;

use app\Core\Filter;
use app\DAO\RolDAO;
use app\DTO\Rol;
use app\Mappers\RolMapper;
use app\Models\RolModel;
use app\Core\Response;

/**
 * Description of Usuario
 *
 * @author Jonathan
 */
class RolBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct(){
        $this->dao = new RolDAO();
        $this->dto = new Rol();
        $this->model = new RolModel();
        $this->mapper = new RolMapper();   
    }


    public function getAll(){
        
        $listRoles = $this->dao->listar();
        return $this->mapper->getListModel($listRoles);
        
    }
    
    
    public function getById($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setType('success');
                    $rsp->setRoute('administracion/rolEdit');
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

    public function save(RolModel $modelo){
        
        $rsp = $modelo->isValid();     
        if($rsp->getType() == 'success'){
            
            $this->dto = $this->mapper->getDTO($modelo);
            if($this->dao->guardar($this->dto)){
                $rsp->setType('success');
                $rsp->setMessage('Los datos fueron guardados.');              
            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al guardar los datos.');              
            }
        }      
        return $rsp;
        
    }
    
    
    public function update(RolModel $modelo){
        
        $rsp = $modelo->isValid(); 
        if($rsp->getType() == 'success'){
            
            $this->dto = $this->mapper->getDTO($modelo);
            if($this->dao->modificar($this->dto)){
                $rsp->setType('success');
                $rsp->setMessage('Los datos fueron actualizados.');
            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al actualizar los datos.');                 
            }
            
        }
        return $rsp;
        
    }
    
    
    public function delete($id, $username){
        
        $rsp = new Response();
        if(Filter::isNumeric($id)){            
            $this->dao->eliminar($id, $username);
            $rsp->setType('success');
            $rsp->setMessage('El rol fue eliminado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El rol seleccionado no es válido.');             
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
            $rsp->setMessage('El rol fue desactivado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El rol seleccionado no es válido.');             
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
            $rsp->setMessage('El rol fue activado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El rol seleccionado no es válido.');             
        }
        return $rsp;
        
    }
    
    
    
    
}
?>