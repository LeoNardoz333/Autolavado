<?php 
	session_start();
    require 'libreria/IClientes.php';
    require 'libreria/ICrud.php';
    require 'libreria/IFunciones.php';
    require 'libreria/IPagos.php';
    require 'libreria/IVentas.php';
	require 'libreria/Administradores.php';
	require 'libreria/Clasificacion.php';
    require 'libreria/Clientes.php';
    require 'libreria/Empleados.php';
    require 'libreria/Login.php';
    require 'libreria/Pagos.php';
    require 'libreria/Ventas.php';
	require 'libreria/Factory.php';
	$p = array();
	View('home',$p);
 ?>