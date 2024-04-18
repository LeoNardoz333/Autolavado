<?php
    class Empleados
    implements ICrud, IFunciones
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
            $q->bind_param('sss', $datos['nombre'], $datos['tipoAuto'], $datos['turno']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $nombret='';
            $tipoAuto='';
            $turno='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * FROM clientes WHERE nombre LIKE ?");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $nombret, $tipoAuto,$turno);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Nombre</th><th>Tipo de auto</th><th>Turno</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$nombret</td>
                <td>$tipoAuto</td>
                <td>$turno</td>
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
            $q->prepare("update clientes set nombre=?, tipoAuto=?, turno=? where id=?");
            $q->bind_param('sss', $datos['nombre'], $datos['tipoAuto'], $datos['turno'], $datos['id']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from clientes where id=$id");
            $q->execute();
            $q->close();
        }
        function generarReporte()
        {

        }
        function calcularCobro()
        {
            
        }
    }
?>