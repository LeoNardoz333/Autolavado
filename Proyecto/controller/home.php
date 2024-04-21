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

// Aquí incluyes el contenido de home.view.php en una variable
ob_start();

$contenido = ob_get_clean();
// Incluyes masterpage.default.view.php y pasas el contenido de home.view.php como parámetro
include 'view/home.view.php';
include 'view/Menu.view.php';
?>
