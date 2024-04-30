<?php
    class Administradores
    implements IPagos, IVentas
    {
        private $reporte;
        
        public function __construct()
        {
            $this->reporte = new GenerarPDF2();
        }

        function pagosDiarios(array $datos)
        {
            $resultados = array();
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $datos['nombre'] = '%'.$datos['nombre'].'%';
            if($datos['fecha'] != ''){
                $resultados = $this->Consultas($q, "select v.fecha, v.nombre, v.cantidad from v_pagosDiarios v where fecha = ? "."
                and nombre like ?", $datos['fecha'], $datos['nombre']);
                $fecha = $datos['fecha'];
                $nombre = $datos['nombre'];
            }
            else{
                $resultados = $this->Consultas($q, "select v.fecha, v.nombre, v.cantidad from v_pagosDiarios v where nombre like ? "."
                order by fecha desc", $datos['nombre'],'no');
                $fecha = '';
                $nombre = $datos['nombre'];
            }
            $this->reporte->GenerarPDF($resultados, 'pagosDiarios', $fecha, $nombre,'Reporte de pagos diarios a empleados');
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
                $resultados = $this->ConsultasSinParam($q, "SELECT v.idEmpleado, v.nombre, v.fecha, v.noClientes ".
                "FROM v_clientesTotales v "."
                JOIN ( "."
                    SELECT fecha, MAX(noClientes) AS maxClientes "."
                    FROM v_clientesTotales "."
                    GROUP BY fecha "."
                ) m ON v.fecha = m.fecha AND v.noClientes = m.maxClientes");
            else
                $resultados = $this->Consultas($q, "select * from v_clientesTotales where fecha = ?".
                    " and nombre like ? GROUP BY idEmpleado ORDER BY noClientes DESC LIMIT 1", 
                    $datos['fecha'], $datos['nombre']);
            $this->reporte->GenerarReporte($resultados, 'Historial de empleados del día', 'Empleados_del_dia');
            $q->close();
        }
        function clientesTotales(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por la fecha del día solicitado
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $datos['nombre'] = '%'.$datos['nombre'].'%';
            if($datos['fecha'] == '')
            {
                $resultados = $this->Consultas($q, "select * from v_clientesTotales where nombre like ?",
                    $datos['nombre'], 'no');
            }
            else
            {
                $resultados = $this->Consultas($q, "select * from v_clientesTotales where fecha = ?".
                " and nombre like ?", $datos['fecha'], $datos['nombre']);
            }
            $this->reporte->GenerarReporte($resultados, 'Clientes totales '.$datos['fecha'], 'Clientes_'.$datos['fecha']);
            $q->close();
        }
        function Consultas($q, $consulta, $parametro, $parametro2)
        {
            $q->prepare($consulta);
            if($parametro2 == 'no')
            {
                $q->bind_param('s', $parametro);
            }
            else
            {
                $q->bind_param('ss', $parametro, $parametro2);
            }
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