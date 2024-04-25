<?php
session_start();
require 'config.php';
require 'libreria/Login.php';
if(!isset($_SESSION['usuario']))
    $_SESSION['usuario']='';
if(!isset($_SESSION['idUsuario']))
    $_SESSION['idUsuario']='';
$p = array();
$p['usuario']='';
if(isset($_POST['login']) && isset($_POST['password']))
{
    $validar = new Login();
    $p['usuario'] = $validar->validar($_POST['login'], $_POST['password']);
    if($p['usuario'] == 'usuario' || $p['usuario'] == 'admin')
    {
        $_SESSION['usuario'] = $_POST['login'];
        $_SESSION['idUsuario'] = $validar->extraerID($_POST['login']);
        View('menu',$p);
        View('home',$p);
    }
    else
    {
        View('menu',$p);
        View('login',$p);
    }
}
else 
{
    View('menu',$p);
    View('login',$p);
}