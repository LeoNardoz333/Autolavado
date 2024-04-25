<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Clientes.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
session_start();
$f = new Factory();
$p = array();
$datos = array();
if(isset($_POST['txtNombre'], $_POST['txtAuto'], $_POST['tipoVehiculo'],
$_POST['txtCaracteristica'], $_POST['txtTurno']))
{
    $datos['nombre'] = $_POST['txtNombre'];
    $datos['auto'] = $_POST['txtAuto'];
    $datos['fktipoAuto'] = $_POST['tipoVehiculo'];
    $datos['turno'] = $_POST['txtTurno'];
    $f->Insertar('Clientes',$datos);
}
$p['resultado'] = $f->Mostrar('Clientes', '');
View('menu',$p);
View('rclientes',$p);