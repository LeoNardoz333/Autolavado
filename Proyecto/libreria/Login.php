<?php
class Login
{
    function validar($usuario, $pass)
    {
        $con = new mysqli(s, u, p, bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $usuarioBD = $this->Consultas($q, "select nombre from empleados where nombre=?",$usuario);
        $passBD = $this->Consultas($q, "select pass from empleados where nombre=?", $usuario);
        $permisos = $this->Consultas($q, "select permisos from empleados where nombre=?", $usuario);
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