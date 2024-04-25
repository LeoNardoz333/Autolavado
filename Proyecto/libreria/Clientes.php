<?php
    class Clientes
    implements IClientes, ICrud
    {
        function turnoClientes($nombre)
        {
            $turno = 0;
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select turno from clientes where nombre = ?");
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($turno);
            $q->close();
            return "El turno del cliente $nombre es el no. $turno";

        }
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_insertarclientes(-1, ?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['nombre'], $datos['auto'], $datos['fktipoAuto'], $datos['turno']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $nombret='';
            $auto='';
            $tipoAuto='';
            $turno='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_mostrarclientes(?)");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $nombret, $tipoAuto,$turno);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Nombre</th><th>Auto</th><th>Tipo de auto</th><th>Turno</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$auto</td>
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
            $q->prepare("call p_insertarclientes(?, ?, ?, ?, ?)");
            $q->bind_param('sssss', $datos['idClientes'], $datos['nombre'], $datos['auto'], $datos['fktipoAuto'], $datos['turno']);
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
            $q->prepare("delete from clientes where id=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
    }
?>
