<?php
    class Ventas
    implements IVentas, ICrud
    {
        function clientesTotales()
        {
            
        }
        function Insertar(array $datos)
        {
            $fecha = date('Y-m-d H:i:s', strtotime($datos['fecha']));
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO ventas VALUES (null, ?, ?)");
            $q->bind_param('sss', $datos['cantClientes'], $fecha);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $cantClientes='';
            $fecha='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * FROM ventas WHERE nombre LIKE ?");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $cantClientes, $fecha);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Cantidad de clientes</th><th>Fecha</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$cantClientes</td>
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
            $q->prepare("update ventas set cantClientes=?, fecha=? where id=?");
            $q->bind_param('sss', $datos['cantClientes'], $fecha, $datos['id']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from ventas where id=$id");
            $q->execute();
            $q->close();
        }
    }
?>