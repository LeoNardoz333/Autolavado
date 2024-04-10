<?php
    session_start();
    $p =array();
    $p['resultado']='xd';
    $p['resultadoEdad']='';
    if(isset($_POST['txtNombre']))
    {
        $p['resultado']=$_POST['txtNombre'];
    }
    View('Uno',$p);
?>