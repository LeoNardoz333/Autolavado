<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Usuarios.php';
require 'libreria/GenerarPDF.php';
require 'libreria/Empleados.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
session_start();
$p = array();
$f = new Factory();
$p['resultado']=$f->Mostrar('Usuarios','');
View('menuadm',$p);
View('gusuarios',$p);


