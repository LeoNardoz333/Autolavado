<?php
    class Clasificacion
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_insertartipoauto(-1, ?, ?, ?)");
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
                <td>".'
                    <form method="post" action="rvehiculos">
                        <button>Eliminar</button>
                        <input type="hidden" value="'.$id.'" name="_id">
                    </form>
                </td>
                <td><button class="editar" _ide="'.$id.'">Editar</button></td>
                </tr>';
            }

            $q->close();
            return $rs.'</tbody></table>
            <script>
                $(".editar").click(function()
                {
                    let _ide = $(this).attr("_ide");
                    $.post("modificarvehiculos",{ide:_ide}, function(mensaje)
                    {
                        $("#x").html(mensaje);
                    });
                });
            </script>';
        }
        function Modificar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("call p_insertartipoauto(?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['idTipoAuto'], $datos['clasificacion'], $datos['unidad'], $datos['valor']);
            $q->execute();
            $q->close();
        }
        function ConsultaID($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from tipoauto where idTipoAuto = ?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->bind_result($id, $clasificacion, $unidad, $valor);
            $q->fetch();
            $q->close();
            return array($id, $clasificacion, $unidad, $valor);
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
        function Validar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select count(*) from tipoauto a, clientes c where a.idTipoAuto = ? and".
            " a.idTipoAuto = c.fkidTipoAuto");
            $q->bind_param('s', $id);
            $q->execute();
            $q->bind_result($conteo);
            $q->fetch();
            $q->close();
            return $conteo;
        }
    }
?>