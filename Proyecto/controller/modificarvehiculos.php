<?php
session_start();
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Clasificacion.php';
$f = new Factory();
if(isset($_POST['ide']))
{
    $dc = $f->ConsultaID('Clasificacion',$_POST['ide']);
    echo $mensaje = '
    <form method="post" action="rvehiculos">
        Clasificacion <input type="text" name="txtClasificacion" placeholder="Tipo de vehiculo"'.
        ' class="form-control" value="'.$dc[1].'"> 
        Unidad <input type="text" name="txtUnidad" placeholder="Unidad en la cual se cobrara el'.
        ' vehiculo" class="form-control" value="'.$dc[2].'">
        Costo <input type="number" name="txtValor" placeholder="Costo de servicio por medida"'.
        ' class="form-control" value="'.$dc[3].'">
        <input type="hidden" name="ide" value="'.$dc[0].'">
        <button type="submit" class="btn btnAdm mt-3">
            Actualizar
        </button>
    </form>';
}