<?php
    require_once('tcpdf/tcpdf.php');
    class GenerarPDF
    {
        private $pdf;
        function titulo($titulo)
        {
            $this->pdf->SetTitle($titulo);
        }
        function GenerarReporte(array $datos, $titulo, $nombrePDF)
        {
            $this->pdf = new TCPDF();
            $this->pdf->SetAuthor('Chibytes');
            $this->pdf->SetFont('helvetica', '', 12);
            $this->titulo($titulo);
            $this->pdf->Cell(0, 10, $titulo, 0, 1);
            
            #$this->pdf->Cell(50, 10, 'Columna 1', 1);
            #$this->pdf->Cell(50, 10, 'Columna 2', 1);
        
            foreach ($datos as $fila) {
                foreach ($fila as $valor) {
                    $this->pdf->Cell(50, 10, $valor, 1);
                }
                $this->pdf->Ln();
            }
            $this->pdf->Output($nombrePDF . '.pdf', 'D');
        }
    }
?>