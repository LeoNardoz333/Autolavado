<?php
    session_start();
    require 'libreria/Ine.php';
    $v=new Ine();
    $p['resultadoEdad']='';
    if(isset($_POST['txtEdad']))
    {
        $p['resultadoEdad']=$v->Validar(intval($_POST['txtEdad']));
    }
    View('Dos',$p)
?>