<?php 
session_start();
/*require 'libreria/IClientes.php';
require 'libreria/ICrud.php';
require 'libreria/IFunciones.php';
require 'libreria/IPagos.php';
require 'libreria/IVentas.php';
require 'libreria/GenerarPDF.php';
require 'libreria/Administradores.php';
require 'libreria/Clasificacion.php';
require 'libreria/Clientes.php';
require 'libreria/Empleados.php';
require 'libreria/Login.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
require 'libreria/Factory.php';*/
$usuario = false;
$p = array();
// View('menu',$p);
if(isset($_SESSION['permisos']))
{
    if($_SESSION['permisos']!='')
    {
        if($_SESSION['permisos'] == 'usuario')
        {
            $usuario=true;
            View('menu',$p);
            View('home',$p);
        }
        else if($_SESSION['permisos'] == 'admin')
        {
            View('menuadm',$p);
            View('admhome',$p);
        }
    }
}
if($usuario==false)
    View('login',$p);

?>
