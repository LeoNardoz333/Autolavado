<div>Registro Clientes</div>
<div class="header-left">
							<img src="images/alavado.png">
</div>
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="home">
            Nombre <input type="text" name="txtNombre" placeholder="Nombre Cliente" class="form-control"> 
            Auto <input type="text" name="txtAuto" placeholder="Auto" class="form-control">

            <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Tipo de vehiculo</label>
  <select class="form-select" id="inputGroupSelect01">
    <option selected>Selecciona...</option>
    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["idTipoAuto"] . "'>" . $row["clasificacion"] . "</option>";
      }
    }
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
            Cantidad <input type="text" name="txtCaracteristica" placeholder="Caracteristica" class="form-control"> 
            Turno <input type="text" name="txtTurno" placeholder="Turno" class="form-control" readonly>
            <button class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <!-- <?php echo $resultado; ?> -->
    </div>

</div>