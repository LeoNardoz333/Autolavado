<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/GenerarPDF2.php';
// require 'libreria/GenerarPDF.php';
require 'libreria/Empleados.php';
require 'libreria/Clientes.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
require 'libreria/VentasTotales.php';
session_start();
$f = new Factory();
$p = array();
$datos = array();
if(isset($_POST['_id']))
{
    $ventas = array();
    $ventasTotales = array();
    $ventas = $f->ConsultaID('Ventas',$_POST['_id']);
    $idEmpleado = $ventas[1];
    $ventasTotales = $f->ConsultaID('Ventas Totales', $idEmpleado);
    $datos['noClientes'] = intval($ventasTotales[2]) - 1;
    $datos['fecha'] = $ventasTotales[3];
    $datos['fkidEmpleado'] = $idEmpleado;
    $f->Modificar('Ventas Totales', $datos);
    #$f->Borrar('Ventas', $_POST['_id']);
    $f->Borrar('Clientes', $_POST['_id']);
}
else if(isset($_POST['ide'], $_POST['txtNombre'], $_POST['txtAuto'], $_POST['tipoVehiculo'],
    $_POST['txtCaracteristica'], $_POST['txtTurno']))
{
    $datos['fecha'] = $_POST['fechaowo'];
    $datos['idClientes'] = $_POST['ide'];
    $datos['cantidad'] = $_POST['txtCaracteristica'];
    $datos['nombre'] = $_POST['txtNombre'];
    $datos['auto'] = $_POST['txtAuto'];
    $datos['fkidTipoAuto'] = $_POST['tipoVehiculo'];
    $datos['turno'] = $_POST['txtTurno'];
    $datos['fkidEmpleado'] = $_SESSION['idUsuario'];
    $f->Modificar('Clientes',$datos);
    $f->Modificar('Ventas',$datos);
}
else if(isset($_POST['txtNombre'], $_POST['txtAuto'], $_POST['tipoVehiculo'],
    $_POST['txtCaracteristica'], $_POST['txtTurno']))
{
    date_default_timezone_set('America/Mexico_City');
    $datos['cantidad'] = $_POST['txtCaracteristica'];
    $datos['fecha'] = date('Y-m-d');
    $datos['nombre'] = $_POST['txtNombre'];
    $datos['auto'] = $_POST['txtAuto'];
    $datos['fkidTipoAuto'] = $_POST['tipoVehiculo'];
    $datos['turno'] = $_POST['txtTurno'];
    $datos['fkidEmpleado'] = $_SESSION['idUsuario'];
    #$p['fecha'] = "update pagos set fkidEmpleado=".$datos['fkidEmpleado'].", cantidad=".
    #$datos['cantidad'].", fecha=".$datos['fecha']." where id=";
    $f->Insertar('Clientes',$datos);
    $f->Insertar('Ventas',$datos);
}
$p['resultado'] = $f->Mostrar('Clientes', '');
View('menu',$p);
View('rclientes',$p);