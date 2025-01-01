<?php

namespace app\BO;

use app\Core\Filter;
use app\Core\Response;
use app\DAO\DetalleSolicitudDAO;
use app\DAO\SolicitudDAO;
use app\DTO\DetalleSolicitud;
use app\DTO\Solicitud;
use app\Mappers\SolicitudMapper;
use app\Models\SolicitudModel;
/**
 * Description of PrestamoBO
 *
 * @author Jonathan
 */
class SolicitudBO {

    private $dao;
    private $dto;
    private $model;
    private $mapper;
    
    public function __construct()
    {
        $this->dao = new SolicitudDAO();
        $this->dto = new Solicitud();
        $this->model = new SolicitudModel();
        $this->mapper = new SolicitudMapper();
    }

    
    public function getAll(){
        
        $list = $this->dao->listar();
        return $this->mapper->getListModel($list);
        
    }
    
    public function getByEstado($estado){
        
        $list = $this->dao->listarByEstado($estado);
        return $this->mapper->getListModel($list);
        
    }    
    
    public function getById($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id, 1);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setRoute('solicitud/prestamoEdit');
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

    
    public function save(SolicitudModel $modelo){
        
        $rsp = $modelo->isValid();        
        if($rsp->getType() == 'success'){
            
            $this->dto = $this->mapper->getDTO($modelo);
            $id = $this->dao->guardar($this->dto);
            if($id > 0){
                
                $rspLibros = $this->saveDetalle($modelo->getLibros(), $id, $modelo->getUsuarioIngreso());
                if($rspLibros->getType() == 'success'){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');    
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Problemas al intentar guardar el detalle de la solicitud.'); 
                }             

            }else{
                $rsp->setType('error');
                $rsp->setMessage($this->dto);              
            }
            
        }              
        return $rsp;
        
    }
    
    private function saveDetalle($libros, $idSolicitud, $userCreate){
        
        $detalle = new DetalleSolicitudDAO();
        $detalleDTO = new DetalleSolicitud();
        $rsp = new Response();
        
        foreach ($libros as $key => $value) {
            
            $detalleDTO->setIdSolicitud($idSolicitud);
            $detalleDTO->setIdLibro($value);
            $detalleDTO->setUsuarioIngreso($userCreate);
            if($detalle->guardar($detalleDTO)){
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
    
    
    public function getListLibroSelect($libros, $detalle){
        
        foreach ($libros as $key => $value) {
            
            foreach ($detalle as $key2 => $value2) {
                
                if($value->getId() == $value2->getIdLibro()){
                    $value->setFlagSolicitud(1);
                }
            }
            
        }
        return $libros;
        
    }
    
    
    public function update(SolicitudModel $modelo){
        
        $rsp = $modelo->isValid();        
        if($rsp->getType() == 'success'){
            
            $this->dto = $this->mapper->getDTO($modelo);           
            if($this->dao->modificar($this->dto)){

                $rspLibros = $this->updateDetalle($modelo->getLibros(), $modelo->getId(), $modelo->getUsuarioModifica());
                if($rspLibros->getType() == 'success' ){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos fueron guardados.');    
                }else{
                    $rsp->setType('error');
                    $rsp->setMessage('Problemas al intentar guardar el detalle de la solicitud.'); 
                }

            }else{
                $rsp->setType('error');
                $rsp->setMessage('Error al actualizar los datos.');              
            }
            
        }     
           
        return $rsp;
        
    }
    
    
    private function updateDetalle($libros, $idSolicitud, $userUpdate){
        
        $detalle = new DetalleSolicitudDAO();
        $detalleDTO = new DetalleSolicitud();
        $rsp = new Response();
        
        $detalle->Eliminar($idSolicitud, $userUpdate);
        foreach ($libros as $key => $libro) {
            
            $detalleDTO->setIdSolicitud($idSolicitud);
            $detalleDTO->setIdLibro($libro);
            $detalleDTO->setUsuarioModifica($userUpdate);
            
            if(!Filter::hasValue($detalle->leer($idSolicitud, $libro, null))){
                
                if($detalle->guardar($detalleDTO)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos de la solicitud fueron actualizados.');
                }else{

                    $rsp->setType('error');
                    $rsp->setMessage('No fue posible agregar nuevos libros.');   
                    break;
                }                
            }else{
                $detalleDTO->setEstadoAuditoria(1);
                $detalleDTO->setUsuarioModifica($userUpdate);
                if($detalle->modificar($detalleDTO)){
                    $rsp->setType('success');
                    $rsp->setMessage('Los datos de la solicitud fueron actualizados.');
                }else{

                    $rsp->setType('error');
                    $rsp->setMessage('No fue posible actualizar los libros.');   
                    break;
                }                  
                
            }
                    
        }
        return $rsp;
        
    }    
    
    
    public function delete($id, $username){
        
        $detalle = new DetalleSolicitudDAO();                      
        $rsp = new Response();
        
        if(Filter::isNumeric($id)){
            if($this->dao->eliminar($id, $username)){
                
                $detalle->eliminar($id, $username);
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
    
    
    public function aprobar($id, $username){
                           
        $rsp = new Response();
        
        if(Filter::isNumeric($id)){
            if($this->dao->aprobar($id, $username)){
                
                $rsp->setType('success');
                $rsp->setMessage('La solicitud fue aprobada.');             
            }else{
                $rsp->setType('error');
                $rsp->setMessage('La solicitud no fue aprobada.');              
            }       

        }else{
            $rsp->setType('error');
            $rsp->setMessage('La solicitud seleccionada no es válida.');             
        }
        return $rsp;
        
    }
    
    
    public function cerrar($id, $observacion, $username){
                           
        $rsp = new Response();
        
        if(Filter::isNumeric($id)){
            if($this->dao->cerrar($id, $observacion, $username)){
                
                $rsp->setType('success');
                $rsp->setMessage('La solicitud fue cerrada.');             
            }else{
                $rsp->setType('error');
                $rsp->setMessage('La solicitud no puede cerrarse.');              
            }       

        }else{
            $rsp->setType('error');
            $rsp->setMessage('La solicitud seleccionada no es válida.');             
        }
        return $rsp;
        
    }
    
    
    public function getByIdApprove($id){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id, 2);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setRoute('solicitud/aprobadaEdit');
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
    
    
    public function getByIdView($id, $estado, $route){

        $rsp = new Response();
        if(Filter::isNumeric($id)){
            $this->dto = $this->dao->leer($id, $estado);  
            $this->model = $this->mapper->getModel($this->dto);

                if(Filter::hasValue($this->model)){
                    $rsp->setRoute($route);
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