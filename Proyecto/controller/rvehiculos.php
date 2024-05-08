<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Clasificacion.php';
session_start();
if(isset($_SESSION['alertaAuto']))
    $_SESSION['alertaAuto'] = 'umu';
$p = array();
$datos = array();
$f = new Factory();
$a = new Clasificacion();
if(isset($_POST['_id']))
{
    $_SESSION['alertaAuto'] = 'umu';
    $existe = $a->Validar($_POST['_id']);
    if($existe < 1)
    {
        $f->Borrar('Clasificacion', $_POST['_id']);
    }
    else
        $_SESSION['alertaAuto'] = 'No puedes borrar este vehículo, ya que existen registros que dependen de éste.';
}
else if(isset($_POST['ide'], $_POST['txtClasificacion'], $_POST['txtUnidad'], $_POST['txtValor']))
{
    $datos['idTipoAuto'] = $_POST['ide'];
    $datos['clasificacion'] = $_POST['txtClasificacion'];
    $datos['unidad'] = $_POST['txtUnidad'];
    $datos['valor'] = $_POST['txtValor'];
    $f->Modificar('Clasificacion', $datos);
}
else if(isset($_POST['txtClasificacion'], $_POST['txtUnidad'], $_POST['txtValor']))
{
    $datos['clasificacion'] = $_POST['txtClasificacion'];
    $datos['unidad'] = $_POST['txtUnidad'];
    $datos['valor'] = $_POST['txtValor'];
    $f->Insertar('Clasificacion', $datos);
}
$p['resultado'] = $f->Mostrar('Clasificacion','');
View('menuadm',$p);
View('rvehiculos',$p);