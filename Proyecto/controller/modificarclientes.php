<?php
require 'config.php';
require 'libreria/Factory.php';
require 'libreria/Clientes.php';
require 'libreria/Pagos.php';
require 'libreria/Ventas.php';
session_start();
$f = new Factory();
$p = array();
$datos = array();
if(isset($_POST['ide']))
{
    $dc = $f->ConsultaID('Clientes', $_POST['ide']);
    $mensaje = '<form method="post" action="rclientes">
        Nombre <input type="text" name="txtNombre" placeholder="Nombre Cliente" class="form-control" value="'.$dc[2].'"> 
        Auto <input type="text" name="txtAuto" placeholder="Auto" class="form-control" value="'.$dc[3].'">
        <div class="input-group mb-3">
            <label class="mt-3" for="inputGroupSelect01">Tipo de vehiculo</label>
            <select class="form-select" id="inputGroupSelect01" name="tipoVehiculo">
                <option value="'.$dc[1].'" selected>'.$dc[4].'</option>';

    //require('config.php');
    $con = new mysqli(s, u, p, bd);
    $con->set_charset("utf8");
    $q = $con->stmt_init();
    $q->prepare("select t.idTipoAuto, t.clasificacion from tipoAuto t");
    $q->execute();
    $result = array();
    $res = $q->get_result();
    while ($row = $res->fetch_assoc()) {
        $result[] = $row;
    }
    if (!empty($result)) {
        foreach ($result as $row) {
            $mensaje .= '<option value="' . $row["idTipoAuto"] . '">' . $row["clasificacion"] . "</option>";
        }
    }
    $mensaje .= '</select>
        </div>
        Cantidad <input type="text" name="txtCaracteristica" placeholder="Caracteristica" class="form-control" value="'.$dc[6].'">
        Turno <input type="text" name="txtTurno" placeholder="Turno" class="form-control" value="'.$dc[5].'" readonly>
        <input type="hidden" name="ide" value="'.$dc[0].'">
        <input type="hidden" name="fechaowo" value="'.$dc[7].'">
        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
    </form>';

    echo $mensaje;

}