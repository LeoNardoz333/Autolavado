<?php
    class Pagos
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $fecha = date('Y-m-d H:i:s', strtotime($datos['fecha']));
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO pagos VALUES (null, ?, ?, ?)");
            $q->bind_param('sss', $datos['idEmpleado'], $datos['cantidad'], $fecha);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $idEmpleado=0;
            $cantidad=0;
            $fecha='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * FROM pagos, empleados WHERE empleados.nombre LIKE ? and pagos.idEmpleado=empleados.idEmpleado");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $idEmpleado, $cantidad, $fecha);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'ID del empleado</th><th>Cantidad</th><th>Fecha</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$idEmpleado</td>
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
            $q->prepare("update pagos set idEmpleado=?, cantidad=?, fecha=? where id=?");
            $q->bind_param('ssss', $datos['idEmpleado'], $datos['cantidad'], $datos['fecha'], $datos['id']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from pagos where id=$id");
            $q->execute();
            $q->close();
        }
    }
?>