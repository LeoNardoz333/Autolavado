<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Usuarios.php';
require 'libreria/GenerarPDF2.php';
require 'libreria/Empleados.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
session_start();
if(!isset($_SESSION['usuario']))
    $_SESSION['usuario']='';
if(!isset($_SESSION['idUsuario']))
    $_SESSION['idUsuario']='';
if(!isset($_SESSION['permisos']))
    $_SESSION['permisos']='';
$f = new Factory();
$usuarios = new Usuarios();
$p = array();
$datos = array();
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
if(isset($_POST['name'],$_POST['username'],$_POST['pass']))
{
    $existe = $usuarios->getUsuario($_POST['name']);
    $datos['usuario'] = $_POST['username'];
    $datos['contrasena'] = $_POST['pass'];
    if(isset($_POST['permisos']))
        $datos['permisos'] = $_POST['permisos'];
    else
        $datos['permisos'] = 'usuario';
    $datos['nombre'] = $_POST['name'];
    $f->Insertar('Empleados',$datos);
    if($existe == 0)
    {
        $datos['fkidEmpleado'] = $usuarios->getIDEmpleado($_POST['name']);
        $f->Insertar('Usuarios',$datos);
    }
}
$p['resultado'] = $f->Mostrar('Usuarios','');
//View('menu',$p);//menuadm
if($_SESSION['permisos'] == 'admin')
{
    View('menuadm',$p);
    View('gusuarios',$p);
}    
else if($_SESSION['permisos'] == 'usuario')
{
    View('menu',$p);
    View('login',$p);
}
else
    View('rusuarios',$p);