<?php
class Login
{
    function validar($usuario, $pass)
    {
        $con = new mysqli(s, u, p, bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $usuarioBD = $this->Consultas($q, "select usuario from usuarios where usuario=?",$usuario);
        $passBD = $this->Consultas($q, "select contrasena from usuarios where usuario=?", $usuario);
        $permisos = $this->Consultas($q, "select permisos from usuarios where usuario=?", $usuario);
        $q->close();
        //Validar
        if(!empty($usuarioBD) || $usuarioBD!=null)
        {
            if($pass == $passBD)
            {
                if($permisos=='admin')
                    return "admin";
                else if($permisos=='usuario')
                    return "usuario";
            }
            else
                return "La contraseña es incorrecta.";
        }
        else
            return "El usuario ingresado no existe.";
    }

    function extraerID($usuario)
    {
        $con = new mysqli(s, u, p, bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        return $this->Consultas($q, "select fkidEmpleado from usuarios where usuario = ?",$usuario);
    }
    
    function Consultas($q, $consulta, $parametro)
    {
        $resultado = '';
        $q->prepare($consulta);
        $q->bind_param('s', $parametro);
        $q->execute();
        $q->bind_result($resultado);
        $q->fetch();
        return $resultado;
    }
}