<?php
    class VentasTotales
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into ventasTotales values(null, ?, ?, ?)");
            $q->bind_param('sss', $datos['fkidEmpleado'], $datos['noClientes'], $datos['fecha']);
            $q->execute();
            $q->close();
        }
        function Consultar($filtro)
        {
            $id=0;
            $idempleado='';
            $empleado='';
            $clientes=0;
            $fecha='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT v.id, v.idEmpleado, v.nombre, v.fecha, v.noClientes ".
            "FROM v_clientesTotales v "."
            JOIN ( "."
                SELECT fecha, MAX(noClientes) AS maxClientes "."
                FROM v_clientesTotales "."
                GROUP BY fecha "."
            ) m ON v.fecha = m.fecha AND v.noClientes = m.maxClientes and v.nombre like ?");
            $filtro='%'.$filtro.'%';
            $q->bind_param('s', $filtro);
            $q->execute();
            $q->bind_result($id, $idempleado, $empleado, $fecha, $clientes);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th>'.
            '<th>ID del empleado</th><th>Empleado</th><th>No. de clientes</th><th>Fecha</th>'.
            '</tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$idempleado</td>
                <td>$empleado</td>
                <td>$fecha</td>
                <td>$clientes</td>
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
            $q->prepare("update ventasTotales set noClientes=?, fecha=? where fkidEmpleado=?");
            $q->bind_param('sss', $datos['noClientes'], $datos['fecha'], $datos['fkidEmpleado']);
            $q->execute();
            $q->close();
        }
        function ConsultaID($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from ventasTotales where fkidEmpleado = ?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->bind_result($idVenta, $idEmpleado, $noClientes, $fecha);
            $q->fetch();
            $q->close();
            return array($idVenta, $idEmpleado, $noClientes, $fecha);
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from ventasTotales where id=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
    }
?>