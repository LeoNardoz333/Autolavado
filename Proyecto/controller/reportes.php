<?php
session_start();
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Administradores.php';
require 'libreria/Ventas.php';
require 'libreria/Pagos.php';
require 'libreria/VentasTotales.php';
$f = new Factory();
$p = array();
$p['resultado'] = '';
if(isset($_POST['reporte']))
{
    if($_POST['reporte'] == 'pagos')
        $p['resultado'] = $f->Mostrar('Pagos','');
}
View('menu',$p);
View('reportes',$p);