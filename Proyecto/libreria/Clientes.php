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
            $q->bind_param('ssss', $datos['nombre'], $datos['auto'], $datos['fkidTipoAuto'], $datos['turno']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $nombret='';
            $auto='';
            $tipoAuto='';
            $turno=0;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT * FROM v_clientes where nombre like ?");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $nombret, $auto, $tipoAuto,$turno);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'Nombre</th><th>Auto</th><th>Tipo de auto</th><th>Turno</th></tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$nombret</td>
                <td>$auto</td>
                <td>$tipoAuto</td>
                <td>$turno</td>".'
                <td><form method="post" action="rclientes">
                        <button> Eliminar </button>
                        <input type="hidden" name="_id" value="'.$id.'">
                    </form>
                </td>
                <td>
                    <button class="editar" _ide="'.$id.'"> Editar </button>
                </td>
                </tr>';
            }

            $q->close();
            return $rs.'</tbody></table>
            <script>
                $(".editar").click(function(){
                    let _ide = $(this).attr("_ide");
                    $.post("modificarclientes",{ide:_ide}, function(mensaje){
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
            $q->prepare("call p_insertarclientes(?, ?, ?, ?, ?)");
            $q->bind_param('sssss', $datos['idClientes'], $datos['nombre'], 
            $datos['auto'], $datos['fkidTipoAuto'], $datos['turno']);
            $q->execute();
            $q->close();
        }
        function ConsultaID($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("SELECT c.idClientes, t.idTipoAuto, c.nombre, c.auto, t.clasificacion, c.turno, p.cantidad".
            " from clientes c, tipoauto t, pagos p "." 
            where c.fkidTipoAuto = t.idTipoAuto and t.idTipoAuto = ?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->bind_result($id,$idTipoAuto, $nombre, $auto, $clasificicacion, $turno, $cantidad);
            $q->fetch();
            $q->close();
            return array($id,$idTipoAuto,$nombre, $auto, $clasificicacion, $turno, $cantidad);
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from clientes where idClientes=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
    }
?>
