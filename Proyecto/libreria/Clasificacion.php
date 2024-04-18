<?php
    class Clasificacion
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("p_insertartipoauto(-1, ?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['clasificacion'], $datos['noPuertas'], $datos['longitud'], 
            $datos['pieza']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $clasificacion='';
            $noPuertas=0;
            $longitud=0;
            $pieza=0;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_mostrartipoauto(?)");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $clasificacion, $noPuertas, $longitud, $pieza);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Clasificación</th><th>Número de puertas</th><th>Longitud</th><th>Pieza</th>'.
            '</tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$clasificacion</td>
                <td>$noPuertas</td>
                <td>$longitud</td>
                <td>$pieza</td>
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
            $q->prepare("p_insertartipoauto(?, ?, ?, ?, ?)");
            $q->bind_param('sssss', $datos['idTipoAuto'], $datos['clasificacion'], $datos['noPuertas'], $datos['longitud'], 
            $datos['pieza']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_eliminartipoauto($id)");
            $q->execute();
            $q->close();
        }
    }
?>