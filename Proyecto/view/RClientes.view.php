<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #93C3CE 0%, #D3E6EA 89%);
  }
  .btn-cus {
        width: 20%;
        margin-bottom: 15px;
		    margin-left: 180px;
    }
</style>
<body class="fondo4">
    <h2 style="color: navy; display: inline-block; margin-left: 20px;">Registro Clientes</h2>
<div class="row"style="width: 1000px;">
    <div class="col-6" id="x">
    <form method="post" action="rclientes" style="font-size: larger; font-weight: bold;" id="formRegistroClientes">
    Nombre <input type="text" name="txtNombre" placeholder="Nombre Cliente" class="form-control" required> 
    Auto <input type="text" name="txtAuto" placeholder="Auto" class="form-control" required><br>
    <div class="input-group mb-3">
        <label class="mt-3" style="font-weight: bold;" for="inputGroupSelect01">Tipo de vehiculo</label>
        <select class="form-select" id="inputGroupSelect01" name="tipoVehiculo" required>
            <option value="" selected>Selecciona...</option> <!-- Agregado un valor vacío -->
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
    Cantidad <input type="number" name="txtCaracteristica" placeholder="Cantidad" class="form-control" required>
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
    <button type="submit" class="btn btn-primary btn-cus">
        Guardar
    </button>
</form>

<script>
    // Validación personalizada para el formulario
    document.getElementById('formRegistroClientes').addEventListener('submit', function(event) {
        const nombre = document.querySelector('input[name="txtNombre"]').value;
        const auto = document.querySelector('input[name="txtAuto"]').value;
        const tipoVehiculo = document.querySelector('select[name="tipoVehiculo"]').value;
        const cantidad = document.querySelector('input[name="txtCaracteristica"]').value;
        
        if (nombre.trim() === '' || auto.trim() === '' || tipoVehiculo.trim() === '' || cantidad.trim() === '') {
            alert('Por favor, complete todos los campos.');
            event.preventDefault();
        }
    });
</script>


    </div>
    <div class="col-6">
        <?php echo $resultado; 
        #echo "\n $fecha;"
        ?>
    </div>
</div>
</body>