<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'helpers.php';
$pagina = 'home';
if(isset($_GET['pagina']))
{
	$pagina = $_GET['pagina'];
}

Controller($pagina);
