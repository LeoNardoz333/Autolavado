<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/GenerarPDF.php';
require 'libreria/Empleados.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
session_start();
$p = array();
$f = new Factory();
if(isset($_POST['ide']))
{
    $datos['nombre'] = $_POST['txtNombre'];
    $datos['idEmpleado'] = $_POST['ide'];
    $f->Modificar('Empleados', $datos);
}
else if(isset($_POST['_id']))
{
    $f->Borrar('Empleados', $_POST['_id']);
}
else if(isset($_POST['txtNombre']))
{
    $datos = array();
    $datos['nombre'] = $_POST['txtNombre'];
    $f->Insertar('Empleados', $datos);
}
$p['resultado']=$f->Mostrar('Empleados','');
View('menu',$p);
View('empleado',$p);
