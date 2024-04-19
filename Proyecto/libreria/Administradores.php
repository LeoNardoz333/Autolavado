<?php
    class Administradores
    implements IPagos, IVentas
    {
        private $reporte = new GenerarPDF();
        function pagosDiarios(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de pago y la fecha
            //Filtrado por la fecha del día solicitado
            $this->reporte->GenerarReporte($datos, 'Pagos a empleados '.$datos['fecha'], 'Pagos_'.$datos['fecha']);
        }
        function empleadoDelDia(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por el empleado que tenga más clientes atendidos por fecha
            $this->reporte->GenerarReporte($datos, 'Historial de empleados del día', 'Empleados_del_dia');
        }
        function clientesTotales(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por la fecha del día solicitado
            $this->reporte->GenerarReporte($datos, 'Clientes totales '.$datos['fecha'], 'Clientes_'.$datos['fecha']);
        }
    }
?>