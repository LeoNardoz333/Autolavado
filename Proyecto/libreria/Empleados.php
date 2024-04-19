<?php
    class Empleados
    implements ICrud, IVentas, IFunciones
    {
        private $reporte = new GenerarPDF();
        private $ventas = new Ventas();
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_insertarempleados(-1, ?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['nombre'], $datos['noAutos'], $datos['noClientes'], $datos['permisos']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $nombret='';
            $noClientes=0;
            $noAutos=0;
            $permisos='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_mostrarempleados(?)");
            //$nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $nombret, $noClientes, $noAutos, $permisos);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Nombre</th><th>Número de clientes</th><th>Número de autos</th><th>Permisos</th>'.
            '</tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$nombret</td>
                <td>$noClientes</td>
                <td>$noAutos</td>
                <td>$permisos</td>
                </tr>";
            }

            $q->close();
            return $rs.'</tbody></table>';
        }
        function Modificar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_insertarempleados(?, ?, ?, ?, ?)");
            $q->bind_param('sssss', $datos['idEmpleado'], $datos['nombre'], $datos['noAutos'], 
            $datos['noClientes'], $datos['permisos']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from empleados where id=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
        function clientesTotales(array $datos)
        {
            //Se tienen que mandar en el array, el id del empleado, el nombre del empleado, la cantidad de clientes y la fecha
            //Filtrado por la fecha del día solicitado
            $this->reporte->GenerarReporte($datos, 'Clientes totales '.$datos['fecha'], 'Clientes_'.$datos['fecha']);
        }
        function calcularCobro(array $datos)
        {
            $valor=0.0;
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select valor from tipoAuto where clasificacion=?");
            $q->bind_param('s', $datos['clasificacion']);
            $q->execute();
            $q->bind_result($valor);
            $q->fetch();
            $pago = $valor * doubleval($datos['cantidad']);
            $datos['pago'] = $pago;
            $this->ventas->Insertar($datos);
            $q->close();
        }
    }
?>