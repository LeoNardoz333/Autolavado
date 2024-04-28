<?php
    class Pagos
    implements ICrud
    {
        function Insertar(array $datos)
        {
            #$fecha = date('Y-m-d H:i:s', strtotime($datos['fecha']));
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO pagos VALUES (null, ?, ?, now())");
            $q->bind_param('ss', $datos['fkidEmpleado'], $datos['pago']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $idEmpleado=0;
            $nombreEmp='';
            $cantidad=0;
            $fecha='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * from v_pagosDiarios where nombre like ? order by fecha desc");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $idEmpleado, $nombreEmp, $cantidad, $fecha);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'ID del empleado</th><th>Nombre</th><th>Cantidad</th><th>Fecha</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$idEmpleado</td>
                <td>$nombreEmp</td>
                <td>$cantidad</td>
                <td>$fecha</td>
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
            $q->prepare("update pagos set fkidEmpleado=?, cantidad=?, fecha=? where id=?");
            $q->bind_param('ssss', $datos['fkidEmpleado'], $datos['pago'], $datos['fecha'], $datos['id']);
            $q->execute();
            $q->close();
        }
        function ConsultaID($id)
        {
            
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from pagos where id=?");
            $q->bind_param('s',$id);
            $q->execute();
            $q->close();
        }
    }
?>