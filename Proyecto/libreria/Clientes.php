<?php
    class Clientes
    implements IClientes, ICrud
    {
        function turnoClientes()
        {

        }
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?, ?)");
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
            $q->prepare("INSERT INTO clientes VALUES (?, ?, ?, ?, ?)");
            $q->bind_param('sssss', $datos['idClientes'], $datos['nombre'], $datos['auto'], $datos['fktipoAuto'], $datos['turno']);
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
    }
        /*function Insertar($maquina, $numSerie,$FechaCompra,$Costo,$tipo)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("INSERT INTO maquinas VALUES (null, ?, ?, STR_TO_DATE(?, '%Y-%m-%d %H:%i:%s'), ?, ?)");
            $fechaCompraFormateada = date('Y-m-d H:i:s', strtotime($FechaCompra));
            $q->bind_param('sssss', $maquina, $numSerie, $fechaCompraFormateada, $Costo, $tipo);
            $q->execute();
            $q->close();
        }

        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * FROM maquinas WHERE maquina LIKE ?");
            $fill='%'.$fill.'%';
            $q->bind_param('s', $fill);
            $q->execute();
            $q->bind_result($id, $maquina,$numSerie,$FechaCompra,$Costo,$tipo);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>Maquina</th><th>'.
            'Número de serie</th><th>Fecha de compra</th><th>Costo</th><th>Tipo</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$maquina</td>
                <td>$numSerie</td>
                <td>$FechaCompra</td>
                <td>$Costo</td>
                <td>$tipo</td>
                </tr>";
            }

            $q->close();
            return $rs.'</tbody></table>';
        }*/
?>
