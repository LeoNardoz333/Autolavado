<?php
    class Ventas
    implements ICrud
    {
        function Insertar(array $datos)
        {
            #$fecha = date('Y-m-d H:i:s', strtotime($datos['fecha']));
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO ventas VALUES (null, ?, ?, ?, ?, now())");
            $q->bind_param('ssss', $datos['fkidEmpleado'], $datos['fkidTipoAuto'], $datos['fkidCliente'],
             $datos['cantidad']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $idEmpleado='';
            $empleado='';
            $noClientes=0;
            $fecha='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from v_clientesTotales where nombre like ?");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $idEmpleado, $empleado, $noClientes, $fecha);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'ID del Empleado</th><th>Empleado</th><th>Número de clientes</th><th>Fecha</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$idEmpleado</td>
                <td>$empleado</td>
                <td>$noClientes</td>
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
            $q->prepare("update ventas set fkidEmpleado=?, fkidTipoAuto=?, cantidad=? where fkidCliente=?");
            $q->bind_param('ssss', $datos['fkidEmpleado'], $datos['fkidTipoAuto'], $datos['cantidad'],
            $datos['idClientes']);
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
            $q->prepare("delete from ventas where id=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
    }
?>