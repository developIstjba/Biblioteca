<?php

namespace app\BO;

use app\Core\Filter;
use app\Core\Response;
use app\DAO\PermisoDAO;
use app\DTO\Permiso;
use app\Mappers\PermisoMapper;
use app\Models\PermisoModel;

/**
 * Description of Usuario
 *
 * @author Jonathan
 */
class PermisoBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct(){
        $this->dao = new PermisoDAO();
        $this->dto = new Permiso();
        $this->model = new PermisoModel();
        $this->mapper = new PermisoMapper();   
    }


    public function getAll(){
        
        $listPermisos = $this->dao->listar();
        return $this->mapper->getListModel($listPermisos);
        
    }
    
    
    public function getById($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setType('success');
                    $rsp->setRoute('administracion/permisoEdit');
                    $rsp->setCode(600);  
                    $rsp->setData($this->model);
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('El permiso seleccionado no es válido.');             
                }
        }else{
            $rsp->setType('error');
            $rsp->setMessage('El permiso seleccionado no es válido.');             
        }   
        return $rsp;
        
    }

    public function save(PermisoModel $modelo){
        
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
    
    
    public function update(PermisoModel $modelo){
        
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
            $rsp->setMessage('El permiso fue eliminado.');           

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El permiso seleccionado no es válido.');             
        }
        return $rsp;
        
    }
    
    

    
    
}
?>