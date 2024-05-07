<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #93C3CE 0%, #D3E6EA 89%);
  }
</style>
<body class="fondo4">
<img style="max-width: 70px; height: auto; display: inline-block; vertical-align: middle;" src="images/alavado.png">
    <h2 style="color: navy; padding-left: 20px; display: inline-block; margin-left: 10px;">Registro Clientes</h2>
</div>
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="rclientes"style="font-size: larger; font-weight: bold;">
            Nombre <input type="text" name="txtNombre" placeholder="Nombre Cliente" class="form-control"> 
            Auto <input type="text" name="txtAuto" placeholder="Auto" class="form-control">

            <div class="input-group mb-3">
  <label class="mt-3"style="font-size: larger; font-weight: bold;" for="inputGroupSelect01">Tipo de vehiculo</label>
  <select class="form-select" id="inputGroupSelect01" name="tipoVehiculo">
    <option selected>Selecciona...</option>
    <?php
    require('config.php');
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
            echo '<option value="' . $row["idTipoAuto"] . '">' . $row["clasificacion"] . "</option>";
        }
    }
    $q->close();
    ?>
  </select>
</div>
<!-- <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Tipo de vehiculo</label>
  <select class="form-select" id="inputGroupSelect01">
    <option selected>Selecciona...</option>
    <option value="1">Auto</option>
    <option value="2">Camioneta</option>
    <option value="3">Tractocamion</option>
  </select>
</div> -->
            Cantidad <input type="number" name="txtCaracteristica" placeholder="Cantidad" class="form-control">
            <?php 
            $turno = 0;
            $fecha = date('Y-m-d');
            $w = $con->stmt_init();
            $w->prepare("SELECT t.turno, t.idClientes from v_turno t, ventas v".
            " WHERE fecha = ? AND v.fkidCliente = t.idClientes");
            $w->bind_param('s', $fecha);
            $w->execute();
            $w->bind_result($turno, $idowo);
            $w->fetch();
            echo
            'Turno <input type="text" name="txtTurno" placeholder="Turno" class="form-control"'.
            'value="'.($turno + 1).'" readonly>';
            $w->close();
            ?>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <?php echo $resultado; 
        #echo "\n $fecha;"
        ?>
    </div>
</div>
</body>