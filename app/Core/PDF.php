<?php

namespace app\Core;

use app\Models\SolicitudModel;
use FPDF;


require './libs/fpdf/fpdf.php';

/**
 * Description of View
 *
 * @author Jonathan
 */
class PDF {

    private $documento;
    private $solicitud;
    private $detalle;
    
    public function __construct(SolicitudModel $solicitud, $detalle) {
        
        $this->documento = new FPDF();
        $this->documento->AddPage('PORTRAIT','A4');
        $this->documento->SetMargins(20,10,20);
        $this->solicitud = $solicitud;
        $this->detalle = $detalle;

    }

    
    private function getHeader(){

    $this->documento->SetFont('Arial','B',14);
    $this->documento->SetTextColor(0,0,0);
    $this->documento->Image("./files/asset/logoJuanBautista.png", 15,10,40,20,'png');
    $this->documento->Image("./files/asset/logoBiblioteca.jpeg", 155,10,40,20,'jpg');
    $this->documento->Ln(20);
    $this->documento->MultiCell(0,10,iconv("UTF-8", "ISO-8859-1", "Instituto Superior Tecnológico Juan Bautista Aguirre"),0,'C',false);

    $this->documento->SetFont('Arial','B',12);
    $this->documento->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Unidad de Biblioteca"),0,'C',false);
    $this->documento->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Solicitud de Préstamo de Libros"),0,'C',false);
    $this->documento->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","No.: ".$this->solicitud->getNumero()),0,'C',false);
    $this->documento->Ln(5);
    
    $this->documento->SetFont('Arial','',11);
    $this->documento->MultiCell(0,5,iconv("UTF-8", "ISO-8859-1","Daule, ".strftime("%A %e de %B de %Y", strtotime($this->solicitud->getFechaAutorizacion()))),0,'R',false);
    $this->documento->Ln(5);
        
    }
    
    private function getInfoSolicitante(){
        $this->documento->SetFont('Arial','B',11);
        $this->documento->MultiCell(0,8,iconv("UTF-8", "ISO-8859-1","Datos del Estudiante"),1,'L',false);
        $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1","Cédula"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(40,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getCedula()),1,0,'L',false);
        $this->documento->SetFont('Arial','B',11);
        $this->documento->Cell(40,8,iconv("UTF-8", "ISO-8859-1","T. Solicitante"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(40,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getNombreTipoSolicitante()),1,1,'L',false);

        $this->documento->SetFont('Arial','B',11);
        $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1","Nombres y Apellidos"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(120,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getNombres()." ".$this->solicitud->getApellidos()),1,1,'L',false);

        $this->documento->SetFont('Arial','B',11);
        $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1","Carrera"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(120,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getNombreArea()),1,1,'L',false);

        $this->documento->SetFont('Arial','B',11);
        $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1","Dirección"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(120,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getDireccion()),1,1,'L',false);   

        $this->documento->SetFont('Arial','B',11);
        $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1","Teléfono"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(40,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getTelefono()),1,0,'L',false);
        $this->documento->SetFont('Arial','B',11);
        $this->documento->Cell(40,8,iconv("UTF-8", "ISO-8859-1","Celular"),1,0,'L',false);
        $this->documento->SetFont('Arial','',11);
        $this->documento->Cell(40,8,iconv("UTF-8", "ISO-8859-1",$this->solicitud->getCelular()),1,1,'L',false);
    }
    
    
    private function getDetalleSolicitud(){
        $this->documento->SetFont('Arial','B',11);
        $this->documento->MultiCell(0,8,iconv("UTF-8", "ISO-8859-1","Detalle de Solicitud"),1,'L',false);
        $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1","Código"),1,0,'L',false);
        $this->documento->Cell(120,8,iconv("UTF-8", "ISO-8859-1","Título / Autor"),1,1,'L',false);

        $this->documento->SetFont('Arial','',11);
        
        foreach ($this->detalle as $key => $value){
            
            
            $tam = strlen($value->getTitulo()." / ".$value->getAutores()); 
            if($tam > 60 and $tam < 120){
                $this->documento->Cell(50,16,iconv("UTF-8", "ISO-8859-1",$value->getCodigo()),1,0,'L',false);
                
            }else if($tam > 120 and $tam < 180){
                $this->documento->Cell(50,24,iconv("UTF-8", "ISO-8859-1",$value->getCodigo()),1,0,'L',false);
            }else if($tam > 180 and $tam < 240){
                $this->documento->Cell(50,24,iconv("UTF-8", "ISO-8859-1",$value->getCodigo()),1,0,'L',false);
            }else{
                $this->documento->Cell(50,8,iconv("UTF-8", "ISO-8859-1",$value->getCodigo()),1,0,'L',false);
            }
            $this->documento->MultiCell(120,8,iconv("UTF-8", "ISO-8859-1",$value->getTitulo()." / ".$value->getAutores()),1,'J',false);       
              
        }
    
        $this->documento->Ln(5);   
        $this->documento->SetFont('Arial','',10);
        $this->documento->MultiCell(0,8,iconv("UTF-8", "ISO-8859-1","Me comprometo a cumplir con las responsabilidades que implica el préstamo, incluyendo el cuidado adecuado de los libros durante el período de préstamo y su devolución en la fecha acordada. Entiendo que soy responsable de cualquier pérdida, daño o robo que pueda ocurrir durante el período de préstamo. Asimismo, estoy de acuerdo en utilizar los libros prestados únicamente para fines educativos y personales, respetando las normas de la biblioteca y manteniendo un ambiente propicio para el estudio y la investigación."),0,'J',false);
        $this->documento->Ln(25);        
    }    
    
    private function getFooter(){
        $this->documento->Cell(85,5,iconv("UTF-8", "ISO-8859-1","_______________________________"),0,0,'C',false);
        $this->documento->Cell(85,5,iconv("UTF-8", "ISO-8859-1","_______________________________"),0,1,'C',false);
        $this->documento->Cell(85,5,iconv("UTF-8", "ISO-8859-1","Firma del Solicitante"),0,0,'C',false);
        $this->documento->Cell(85,5,iconv("UTF-8", "ISO-8859-1","Firma del Responsable de Biblioteca"),0,1,'C',false);        
    }
    
    public function generate(){
        
        $this->getHeader();
        $this->getInfoSolicitante();
        $this->getDetalleSolicitud();
        $this->getFooter();
        $this->documento->Close();
        $this->documento->Output('D',$this->solicitud->getNumero().".pdf", false);
    }
    
    
}
?>
