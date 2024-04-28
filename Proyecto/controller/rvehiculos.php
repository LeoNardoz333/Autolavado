<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Clasificacion.php';
session_start();
$p = array();
$datos = array();
$f = new Factory();
if(isset($_POST['_id']))
{
    $f->Borrar('Clasificacion', $_POST['_id']);
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