<?php
    class Administradores
    implements ICrud, IPagos, IVentas
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO empleados VALUES (null, ?, ?, ?, ?)");
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
            $q->prepare("SELECT * FROM empleados WHERE nombre LIKE ?");
            $nombre='%'.$nombre.'%';
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
            $q->prepare("update empleados set noAutos=?, noClientes=?, nombre=?, permisos=? where id=?");
            $q->bind_param('sssss', $datos['noAutos'], $datos['noClientes'], $datos['nombre'], $datos['permisos'],
             $datos['id']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from empleados where id=$id");
            $q->execute();
            $q->close();
        }
        function pagosDiarios(array $datos)
        {
            $pagos = new Pagos();
            $pagos -> Insertar($datos);
        }
        function empleadoDelDia(array $datos)
        {

        }
        function clientesTotales()
        {
            
        }
    }
?>