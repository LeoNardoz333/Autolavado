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
        function ReportePagos($empleado, $pago, $fecha)
        {
            $this->titulo('Reporte de pagos diarios a empleados');
            $this->pdf->Cell(0, 10, "El empleado $empleado ha recibido de paga la cantidad de $$pago en el día $fecha.", 0, 1);
            $this->pdf->Output('Pago_'.$empleado.'_'.$fecha.'.pdf', 'D');
        }
        function ReporteClientes($empleado, $noClientes, $fecha)
        {
            $this->titulo('Reporte de clientes atendidos diarios');
            $this->pdf->Cell(0, 10, "El empleado $empleado ha atendido la cantidad de $noClientes en el día $fecha.", 0, 1);
            $this->pdf->Output('Clientes_'.$empleado.'_'.$fecha.'.pdf', 'D');
        }
        function ReporteEmpDia($empleado, $noClientes, $fecha)
        {
            $this->titulo('Reporte de clientes atendidos diarios');
            $this->pdf->Cell(0, 10, "El empleado del día $fecha fue $empleado, quien ha atendido la cantidad de $noClientes.", 0, 1);
            $this->pdf->Output('EmpDia_'.$empleado.'_'.$fecha.'.pdf', 'D');
        }
    }
?>