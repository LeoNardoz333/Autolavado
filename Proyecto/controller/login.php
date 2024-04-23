<?php
session_start();
include 'view/Menu.view.php';
include 'view/Login.view.php';
require 'libreria/Login.php';
require 'config.php';
$validar = new Login();
$p = array();
$p['usuario']='';
if(isset($_POST['login']) && isset($_POST['pass']))
{
    $validar = new Login();
    $p['usuario'] = $validar->validar($_POST['login'], $_POST['pass']);
    if($p['usuario'] == 'usuario' || $p['usuario'] == 'admin')
    {
        View('RClientes',$p);
    }
    else
    {
        View('Login',$p);
    }
}