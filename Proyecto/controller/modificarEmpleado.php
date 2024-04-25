<?php
session_start();
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Empleados.php';
require 'libreria/Ventas.php';
require 'libreria/Pagos.php';
$f = new Factory();
if(isset($_POST['ide']))
{
    $dc = $f->ConsultaID('Empleados',$_POST['ide']);
    echo $mensaje =
    '<form method="post" action="empleado">
        Nombre <input type="text" name="txtNombre" placeholder="Nombre Empleado" class="form-control" value="'.
        $dc[1].'"> 
        <input type="hidden" name="ide" value="'.$dc[0].'">
        <button class="btn btn-primary ">Actualizar</button>
    </form>';
}