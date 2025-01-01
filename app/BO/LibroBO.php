<?php

namespace app\BO;

use app\Core\Filter;
use app\Core\Response;
use app\DAO\LibroAreaDAO;
use app\DAO\LibroAutorDAO;
use app\DAO\LibroDAO;
use app\DTO\Libro;
use app\DTO\LibroArea;
use app\DTO\LibroAutor;
use app\Mappers\LibroMapper;
use app\Models\LibroModel;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class LibroBO {
    
    private $dao;
    private $dto;
    private $model;
    private $mapper;
    
    public function __construct()
    {
        $this->dao = new LibroDAO();
        $this->dto = new Libro();
        $this->model = new LibroModel();
        $this->mapper = new LibroMapper();
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
                    $rsp->setRoute('biblioteca/libroEdit');
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
    
    
    public function save(LibroModel $modelo){
        
        $rsp = $modelo->isValid();        
        if($rsp->getType() == 'success'){
            
            $this->dto = $this->mapper->getDTO($modelo);
            $id = $this->dao->guardar($this->dto);
            if($id > 0){

                $rspAutores = $this->saveAutor($modelo->getAutores(), $id, $modelo->getUsuarioIngreso());
                $rspAreas = $this->saveArea($modelo->getAreas(), $id, $modelo->getUsuarioIngreso());

                if($rspAutores->getType() == 'success' && $rspAreas->getType() == 'success'){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');    
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Problemas al intentar guardar los datos de los autores/áreas.'); 
                }             

            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al guardar los datos.');              
            }
            
        }     
           
        return $rsp;
        
    }
    
    private function saveAutor($autores, $idLibro, $userCreate){
        
        $libroAutor = new LibroAutorDAO();
        $libroAutorDTO = new LibroAutor();
        $rsp = new Response();
        
        foreach ($autores as $key => $autor) {
            
            $libroAutorDTO->setIdLibro($idLibro);
            $libroAutorDTO->setIdAutor($autor);
            $libroAutorDTO->setUsuarioIngreso($userCreate);
            if($libroAutor->guardar($libroAutorDTO)){
                $rsp->setType('success');
                $rsp->setMessage('Los datos fueron guardados.');
            }else{
            
                $rsp->setType('error');
                $rsp->setMessage('Error al guardar los datos.');   
                break;
            }
                    
        }
        return $rsp;
        
    }
    
    
    private function saveArea($areas, $idLibro, $userCreate){
        
        $libroArea = new LibroAreaDAO();
        $libroAreaDTO = new LibroArea();
        $rsp = new Response();
        
        foreach ($areas as $key => $area) {
            
            $libroAreaDTO->setIdLibro($idLibro);
            $libroAreaDTO->setIdArea($area);
            $libroAreaDTO->setUsuarioIngreso($userCreate);
            if($libroArea->guardar($libroAreaDTO)){
                $rsp->setType('success');
                $rsp->setMessage('Los datos fueron guardados.');
            }else{
                
                $rsp->setType('error');
                $rsp->setMessage('Error al guardar los datos.');   
                break;
            }
                    
        }
        return $rsp;
        
    }
    
    public function delete($id, $username){
        $autor = new LibroAutorDAO();
        $area = new LibroAreaDAO();                       
        $rsp = new Response();
        
        if(Filter::isNumeric($id)){
            if($this->dao->eliminar($id, $username)){
                
                $autor->eliminar($id, $username);
                $area->eliminar($id, $username);
                $rsp->setType('success');
                $rsp->setMessage('El registro fue eliminado.');             
            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al eliminar los datos.');              
            }       

        }else{
            $rsp->setType('error');
            $rsp->setMessage('El libro seleccionado no es válido.');             
        }
        return $rsp;
        
    }
    
    
    public function update(LibroModel $modelo){
        
        $rsp = $modelo->isValid();        
        if($rsp->getType() == 'success'){
            
            $this->dto = $this->mapper->getDTO($modelo);           
            if($this->dao->modificar($this->dto)){

                $rspAutores = $this->updateAutor($modelo->getAutores(), $modelo->getId(), $modelo->getUsuarioModifica());
                $rspAreas = $this->updateArea($modelo->getAreas(), $modelo->getId(), $modelo->getUsuarioModifica());

                if($rspAutores->getType() == 'success' && $rspAreas->getType() == 'success'){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');    
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Problemas al intentar guardar los datos de los autores/áreas.'); 
                }

            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al actualizar los datos.');              
            }
            
        }     
           
        return $rsp;
        
    }
    
    
    private function updateAutor($autores, $idLibro, $userCreate){
        
        $libroAutor = new LibroAutorDAO();
        $libroAutorDTO = new LibroAutor();
        $rsp = new Response();
        
        $libroAutor->Eliminar($idLibro, $userCreate);
        foreach ($autores as $key => $autor) {
            
            $libroAutorDTO->setIdLibro($idLibro);
            $libroAutorDTO->setIdAutor($autor);
            $libroAutorDTO->setUsuarioIngreso($userCreate);
            
            if(!Filter::hasValue($libroAutor->leer($idLibro, $autor, null))){
                
                if($libroAutor->guardar($libroAutorDTO)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos del libro fueron actualizados.');
                }else{

                    $rsp->setType('error');
                    $rsp->setMessage('No fue posible agregar nuevos autores.');   
                    break;
                }                
            }else{
                $libroAutorDTO->setEstadoAuditoria(1);
                $libroAutorDTO->setUsuarioModifica($userCreate);
                if($libroAutor->modificar($libroAutorDTO)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos del libro fueron actualizados.');
                }else{

                    $rsp->setType('error');
                    $rsp->setMessage('No fue posible actualizar los autores.');   
                    break;
                }                  
                
            }
                    
        }
        return $rsp;
        
    }
    
    
    private function updateArea($areas, $idLibro, $userCreate){
        
        $libroArea = new LibroAreaDAO();
        $libroAreaDTO = new LibroArea();
        $rsp = new Response();
        
        $libroArea->Eliminar($idLibro, $userCreate);
        foreach ($areas as $key => $area) {
            
            $libroAreaDTO->setIdLibro($idLibro);
            $libroAreaDTO->setIdArea($area);
            $libroAreaDTO->setUsuarioIngreso($userCreate);
            
            if(!Filter::hasValue($libroArea->leer($idLibro, $area, null))){            
                if($libroArea->guardar($libroAreaDTO)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');
                }else{

                    $rsp->setType('error');
                    $rsp->setMessage('No fue posible agregar nuevas áreas.');   
                    break;
                }
            }else{
                $libroAreaDTO->setEstadoAuditoria(1);
                $libroAreaDTO->setUsuarioModifica($userCreate);
                if($libroArea->modificar($libroAreaDTO)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos del libro fueron actualizados.');
                }else{

                    $rsp->setType('error');
                    $rsp->setMessage('No fue posible actualizar las áreas.');   
                    break;
                }                  
                
            }        
        }
        return $rsp;
        
    }
    

    public function getDisponibles(){
        
        $list = $this->dao->listarDisponibles();
        return $this->mapper->getListModel($list);
        
    }    
    
    
    public function getDetail($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setRoute('biblioteca/libroDetalle');
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
    
    
}
?>