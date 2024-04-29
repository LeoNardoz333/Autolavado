<?php
session_start();
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/GenerarPDF.php';
require 'libreria/GenerarPDF2.php';
require 'libreria/Administradores.php';
require 'libreria/Ventas.php';
require 'libreria/Pagos.php';
require 'libreria/VentasTotales.php';
if(!isset($_SESSION['reporte']))
    $_SESSION['reporte'] = '';
$f = new Factory();
$a = new Administradores();
$pdf = new GenerarPDF2();
$p = array();
$datos = array();
$p['resultado'] = '';
if(isset($_POST['reporte']))
{
    if($_POST['reporte'] == 'pagos')
    {
        $_SESSION['reporte'] = 'pagos';
        $p['resultado'] = $f->Mostrar('Pagos','');
    }
    else if($_POST['reporte'] == 'servicios')
    {
        $_SESSION['reporte'] = 'servicios';
        $p['resultado'] = $f->Mostrar('Ventas','');
    }
    else if($_POST['reporte'] == 'empleados')
    {
        $_SESSION['reporte'] = 'empleados';
        $p['resultado'] = $f->Mostrar('VentasTotales','');
    }
}
if(isset($_POST['imprimir']))
{
    if($_SESSION['reporte'] == 'pagos')
    {
        $datos['fecha'] = '';
        $datos['nombre'] = '';
        $a->pagosDiarios($datos);
    }
    else if($_SESSION['reporte'] == 'servicios')
    {
        $datos['fecha'] = '';
        $datos['nombre'] = '';
        //$a->clientesTotales($datos);
        $pdf->GenerarPDF();
    }
    else if($_SESSION['reporte'] == 'empleados')
    {
        $datos['fecha'] = '';
        $datos['nombre'] = '';
        $a->empleadoDelDia($datos, "si uwu");
    }
}
View('menu',$p);
View('reportes',$p);