<?php
    class Clasificacion
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("p_insertartipoauto(-1, ?, ?, ?)");
            $q->bind_param('sss',$datos['clasificacion'], $datos['unidad'], $datos['valor']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $clasificacion='';
            $unidad=0;
            $valor=0;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_mostrartipoauto(?)");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $clasificacion, $unidad, $valor);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th>'.
            '<th>Clasificación</th><th>Unidad de medida</th><th>Valor $</th>'.
            '</tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$clasificacion</td>
                <td>$unidad</td>
                <td>$valor</td>
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
            $q->prepare("p_insertartipoauto(?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['idTipoAuto'], $datos['clasificacion'], $datos['unidad'], $datos['valor']);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_eliminartipoauto(?)");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
    }
?>