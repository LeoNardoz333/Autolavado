<?php
session_start();
session_destroy();
$_SESSION['usuario'] = '';
$_SESSION['idUsuario'] = '';
$_SESSION['permisos'] = '';
$p = array();
View('menu', $p);
View('login', $p);