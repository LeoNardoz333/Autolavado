<?php
    session_start();
    require 'libreria/Convertir.php';
    $v=new Convertir();
    $p['resultadoM']='';
    if(isset($_POST['txtMoneda']))
    {
        $p['resultadoM']=$v->Dolares(intval($_POST['txtMoneda']));
    }
    View('Monedas',$p)
?>