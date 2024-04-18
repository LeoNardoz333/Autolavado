<?php
    require_once('tcpdf/tcpdf.php');
    class GenerarPDF
    {
        private $pdf;
        public function __construct()
        {
            $this->pdf = new TCPDF();
            $this->pdf->SetAuthor('Chibytes');
            $this->pdf->SetFont('helvetica', '', 12);
        }
        function titulo($titulo)
        {
            $this->pdf->SetTitle($titulo);
        }
        function GenerarReporte(array $datos, $titulo, $nombrePDF)
        {
            $this->titulo($titulo);
            $this->pdf->Cell(0, 10, $titulo, 0, 1);
            foreach ($datos as $fila) {
                $texto = implode(', ', $fila);
                $this->pdf->Cell(0, 10, $texto, 0, 1);
            }
            $this->pdf->Output($nombrePDF . '.pdf', 'D');
        }
    }
?>