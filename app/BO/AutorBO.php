<?php

namespace app\BO;

use app\Core\Filter;
use app\Core\Response;
use app\DAO\AutorDAO;
use app\DTO\Autor;
use app\Mappers\AutorMapper;
use app\Models\AutorModel;
use app\Models\EditorialModel;


/**
 * Description of Menu
 *
 * @author Jonathan
 */
class AutorBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;

    public function __construct()
    {
        $this->dao = new AutorDAO();
        $this->dto = new Autor();
        $this->model = new AutorModel();
        $this->mapper = new AutorMapper();        
    }

    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
    
    public function getById($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    if($this->dto->getCorporativo()){
                        $rsp->setRoute('biblioteca/autorCorporativoEdit');
                    }else{
                        $rsp->setRoute('biblioteca/autorEdit');                    
                    }
                    $rsp->setType('success');
                    $rsp->setCode(600);  
                    $rsp->setData($this->model);
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('El registro seleccionado no es válido.');             
                }
        }else{
            $rsp->setType('error');
            $rsp->setMessage('El registro seleccionado no es válido.');             
        }   
        return $rsp;
        
    }
    
    
    public function save(AutorModel $modelo){
        
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
    
    
    public function update(AutorModel $modelo){
        
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
            if($this->dao->eliminar($id, $username)){
                $rsp->setType('success');
                $rsp->setMessage('El registro fue eliminado.');             
            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al eliminar los datos.');              
            }       

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El rol seleccionado no es válido.');             
        }
        return $rsp;
        
    }

    






    
    
}
?>