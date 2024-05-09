<style>
.fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #93C3CE 0%, #D3E6EA 89%);
  }
  .btn-cus {
    width: 20%;
    margin-bottom: 15px;
		margin-left: 220px;
    }
</style>
<body class="fondo4">
<div class="row" style="width: 1200px;">
        <div class="col-6" id="x">
            <form id="vehicleForm" method="post" action="rvehiculos" style="font-size: larger; font-weight: bold;">
                Clasificación <input type="text" name="txtClasificacion" placeholder="Tipo de vehículo" class="form-control" minlength="3" maxlength="80">
                Unidad <input type="text" name="txtUnidad" placeholder="Unidad en la cual se cobrará el vehículo" class="form-control" minlength="3" maxlength="80">
                Costo <input type="number" name="txtValor" placeholder="Costo de servicio por medida" class="form-control" min="1" max="100000" >
                <button type="submit" class="btn btnAdm btn-cus mt-3">
                    Guardar
                </button>
            </form>
        </div>
        <div class="col-6">
            <?php echo $resultado; ?>
        </div>
    </div>
    <?php
    // Verifica si existe la variable de sesión 'alertaAuto'
    if (isset($_SESSION['alertaAuto'])) {
        if ($_SESSION['alertaAuto'] != 'umu') {
            echo '<script>alert("' . $_SESSION['alertaAuto'] . '");</script>';
            unset($_SESSION['alertaAuto']);
        }
    }
    ?>
    <script>
        document.getElementById("vehicleForm").addEventListener("submit", function (event) {
            var clasificacion = document.getElementsByName("txtClasificacion")[0].value;
            var unidad = document.getElementsByName("txtUnidad")[0].value;
            var costo = document.getElementsByName("txtValor")[0].value;

            if (clasificacion.trim() === "") {
                alert("Por favor, ingresa la clasificación del vehículo.");
                event.preventDefault();
            } else if (unidad.trim() === "") {
                alert("Por favor, ingresa la unidad en la cual se cobrará el vehículo.");
                event.preventDefault();
            } else if (costo.trim() === "") {
                alert("Por favor, ingresa el costo de servicio por medida.");
                event.preventDefault();
            }
        });
    </script>
</body>