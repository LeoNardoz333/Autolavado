<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData($file) {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }
    public function PagosDiarios($header,$data) {
        $this->SetFillColor(27, 150, 83);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 120, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 100, 40);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row["fecha"], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row["nombre"], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, floatval($row["cantidad"]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}        
class GenerarPDF2
{
    function GenerarPDF(array $data, $reporte, $fecha, $empleado, $titulo)
    {
        $nombre = '';
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        #$pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Chibytes');
        $pdf->SetTitle($titulo);
        if($fecha==''&& $empleado=='%%'){
            $pdf->SetSubject('Todos los registros');
            $texto = 'Todos los registros';
        }
        else if($fecha==''&& $empleado!='%%'){
            $pdf->SetSubject('TFiltrado por empleado');
            $texto = 'Filtrado por empleado';
        }
        else if($fecha!=''&& $empleado=='%%'){
            $pdf->SetSubject('Filtrado por día');
            $texto = 'Filtrado por día';
        }
        else if($fecha!=''&& $empleado!='%%'){
            $pdf->SetSubject('Filtrado por empleado y día');
            $texto = 'Filtrado por empleado y día';
        }
        // set default header data
        $pdf->SetHeaderData('', 0, $titulo, $texto);
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        // set font
        $pdf->SetFont('helvetica', '', 12);
        // add a page
        $pdf->AddPage();
        // column titles
        if($fecha != '')
            $fecha = '_' . $fecha;
        if($empleado != '%%')
            $empleado = '_' . $empleado;
        if($reporte == 'pagosDiarios'){
            $header = array('Fecha', 'Empleado', 'Cantidad pagada');
            $pdf->PagosDiarios($header, $data);
            $nombre = 'pagosDiarios';
        }
        $pdf->Output($nombre . $empleado . $fecha . '.pdf', 'D');
    }
}