<?php
session_start();
$_SESSION['usuario']='';
$_SESSION['idUsuario']='';
$_SESSION['permisos']='';
$p = array();
View('menu',$p);
View('login',$p);