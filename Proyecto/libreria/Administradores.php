<?php
    class Administradores
    implements IPagos, IVentas
    {
        private $reporte;
        private $resultados = array();
        
        public function __construct()
        {
            $this->reporte = new GenerarPDF();
        }

        function pagosDiarios(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de pago y la fecha
            //Filtrado por la fecha del día solicitado
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $this->resultados = $this->Consultas($q, "select * from v_pagosDiarios where fecha = ?",
                $datos['fecha']);
            $this->reporte->GenerarReporte($this->resultados, 'Pagos a empleados '.$datos['fecha'], 'Pagos_'.$datos['fecha']);
            $q->close();
        }
        function empleadoDelDia(array $datos, $todos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por el empleado que tenga más clientes atendidos por fecha
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            if($todos=='si uwu')
                $this->resultados = $this->ConsultasSinParam($q, "SELECT v.idEmpleado, v.nombre, v.fecha, v.noClientes ".
                "FROM v_clientesTotales v "."
                JOIN ( "."
                    SELECT fecha, MAX(noClientes) AS maxClientes "."
                    FROM v_clientesTotales "."
                    GROUP BY fecha "."
                ) m ON v.fecha = m.fecha AND v.noClientes = m.maxClientes");
            else
                $this->resultados = $this->Consultas($q, "select * from v_clientesTotales where fecha = ?".
                    " GROUP BY idEmpleado ORDER BY noClientes DESC LIMIT 1", $datos['fecha']);
            $this->reporte->GenerarReporte($this->resultados, 'Historial de empleados del día', 'Empleados_del_dia');
            $q->close();
        }
        function clientesTotales(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por la fecha del día solicitado
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $this->resultados = $this->Consultas($q, "select * from v_clientesTotales where fecha = ?",
                $datos['fecha']);
            $this->reporte->GenerarReporte($this->resultados, 'Clientes totales '.$datos['fecha'], 'Clientes_'.$datos['fecha']);
            $q->close();
        }
        function Consultas($q, $consulta, $parametro)
        {
            $q->prepare($consulta);
            $q->bind_param('s', $parametro);
            $q->execute();
            $result = $q->get_result();
            $rows = array();
            while ($row = $result->fetch_assoc()) 
            {
                $rows[] = $row;
            }
            return $rows;
        }
        function ConsultasSinParam($q, $consulta)
        {
            $q->prepare($consulta);
            $q->execute();
            $result = $q->get_result();
            $rows = array();
            while ($row = $result->fetch_assoc()) 
            {
                $rows[] = $row;
            }
            return $rows;
        }
    }
?>