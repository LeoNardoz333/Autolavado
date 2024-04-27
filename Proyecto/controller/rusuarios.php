<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Usuarios.php';
require 'libreria/GenerarPDF.php';
require 'libreria/Empleados.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
session_start();
$f = new Factory();
$usuarios = new Usuarios();
$p = array();
$datos = array();
/*
if(isset($_POST['_id']))
{
    $f->Borrar('Usuarios',$_POST['_id']);
    $f->Borrar('Empleados',$_POST['_id']);
}
else if(isset($_POST['ide'],$_POST['name'],$_POST['username'],$_POST['pass'],$_POST['permisos']))
{
    $datos['fkidEmpleado'] = $_POST['ide'];
    $datos['usuario'] = $_POST['username'];
    $datos['contrasena'] = $_POST['pass'];
    $datos['permisos'] = $_POST['permisos'];
    $datos['nombre'] = $_POST['name'];
    $datos['idEmpleado'] = $_POST['ide'];
    $f->Modificar('Usuarios',$datos);
    $f->Modificar('Empleados',$datos);
}
*/
if(isset($_POST['name'],$_POST['username'],$_POST['pass']))
{
    $existe = $usuarios->getUsuario($_POST['name']);
    $datos['usuario'] = $_POST['username'];
    $datos['contrasena'] = $_POST['pass'];
    $datos['permisos'] = 'usuario';
    $datos['nombre'] = $_POST['name'];
    $f->Insertar('Empleados',$datos);
    if($existe == 0)
    {
        $datos['fkidEmpleado'] = $usuarios->getIDEmpleado($_POST['name']);
        $f->Insertar('Usuarios',$datos);
    }
}
$f->Mostrar('Usuarios','');
View('menu',$p);
View('rusuarios',$p);