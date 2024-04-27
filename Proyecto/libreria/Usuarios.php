<?php
    class Usuarios
    implements ICrud
    {
        function Insertar(array $datos)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into usuarios values(null, ?, ?, ?, ?)");
            $q->bind_param('ssss', $datos['fkidEmpleado'], $datos['usuario'], $datos['contrasena'],
            $datos['permisos']);
            $q->execute();
            $q->close();
        }
        function Consultar($nombre)
        {
            $id=0;
            $idEmpleado='';
            $nombreE='';
            $usuario='';
            $contrasena='';
            $permisos='';
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select u.idUsuario, e.idEmpleado, e.nombre, u.usuario, u.contrasena, u.permisos".
            " from empleados e, usuarios u where e.nombre like ? and e.idEmpleado = u.fkidEmpleado");
            $nombre='%'.$nombre.'%';
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id, $idEmpleado, $nombre, $usuario, $contrasena, $permisos);

            $rs = '<table class="table table-bordered table-striped"><thead><tr><th>ID</th><th>'.
            'ID del empleado</th><th>Nombre</th><th>Usuario</th><th>Contraseña</th><th>Permisos</th>'.
            '</tr></thead><tbody>';

            while ($q->fetch()) {
                $rs .= "<tr>
                <td>$id</td>
                <td>$idEmpleado</td>
                <td>$nombreE</td>
                <td>$usuario</td>
                <td>$contrasena</td>
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
            $q->prepare("update usuarios set usuario = ?, contrasena = ?, 
            permisos = ? where fkidEmpleado = ?");
            $q->bind_param('sssss', $datos['usuario'], $datos['contrasena'],
            $datos['permisos'], $datos['fkidEmpleado']);
            $q->execute();
            $q->close();
        }
        function ConsultaID($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select u.idUsuario, e.idEmpleado, e.nombre, u.usuario, u.contrasena, u.permisos".
            " from empleados e, usuarios u where e.idEmpleado = u.fkidEmpleado and e.idEmpleadoby = ? ".
            "e.idEmpleado desc limit 1");
            $q->bind_param('s', $id);
            $q->execute();
            $q->bind_result($idUsuario, $idEmpleado, $nombre, $usuario, $pass, $permisos);
            $q->fetch();
            $q->close();
            return array($idUsuario, $idEmpleado, $nombre, $usuario, $pass, $permisos);
        }
        function Borrar($id)
        {
            $con = new mysqli(s, u, p, bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from usuarios where fkidEmpleado=?");
            $q->bind_param('s', $id);
            $q->execute();
            $q->close();
        }
        function getIDEmpleado($nombre)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select idEmpleado from empleados where nombre=? order by idEmpleado desc limit 1");
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id);
            $q->fetch();
            $q->close();
            return $id;
        }
        function getUsuario($nombre)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select count(*) from usuarios u, empleados e".
            " where e.nombre=? and u.fkidEmpleado = e.idEmpleado");
            $q->bind_param('s', $nombre);
            $q->execute();
            $q->bind_result($id);
            $q->fetch();
            $q->close();
            return $id;
        }
    }
?>