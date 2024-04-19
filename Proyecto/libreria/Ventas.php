<?php
    class Ventas
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $fecha = date('Y-m-d H:i:s', strtotime($datos['fecha']));
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO ventas VALUES (null, ?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['fkidEmpleado'], $datos['fkidTipoAuto'], $datos['cantidad'],
            $fecha);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $empleado='';
            $tipoAuto='';
            $cantidad=0;
            $fecha='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * FROM v_ventas where nombre like ?");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $empleado, $tipoAuto, $cantidad, $fecha);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Empleado</th><th>Tipo de auto</th><th>Cantidad</th><th>Fecha</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$empleado</td>
                <td>$tipoAuto</td>
                <td>$cantidad</td>
                <td>$fecha</td>
                </tr>";
            }

            $q->close();
            return $rs.'</tbody></table>';
        }
        function Modificar(array $datos)
        {
            $fecha = date('Y-m-d H:i:s', strtotime($datos['fecha']));
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("update ventas set fkidEmpleado=?, fkidTipoAuto=?, cantidad=?, fecha=? where id=?");
            $q->bind_param('sssss', $datos['fkidEmpleado'], $datos['fkidTipoAuto'], $datos['cantidad'],
            $fecha, $datos['id']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from ventas where id=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
    }
?>