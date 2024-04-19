<hr>
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
  <select class="form-select" id="inputGroupSelect01" onchange="showFields()">
    <option selected>Selecciona...</option>
    <option value="1">Auto</option>
    <option value="2">Camioneta</option>
    <option value="3">Tractocamion</option>
  </select>
</div>

<div id="autoFields" style="display: none;">
  <label for="autoModel">Piezas:</label>
  <input type="text" id="autoModel" name="autoModel">
</div>

<div id="camionetaFields" style="display: none;">
  <label for="camionetaMarca">Puertas:</label>
  <input type="text" id="camionetaMarca" name="camionetaMarca">
</div>
<div id="tractocamionFields" style="display: none;">
  <label for="tractocamionMarca">Longitud:</label>
  <input type="text" id="tractocamionMarca" name="tractocamionMarca">
</div>

<script>
function showFields() {
  var select = document.getElementById("inputGroupSelect01");
  var selectedOption = select.options[select.selectedIndex].value;

  document.getElementById("autoFields").style.display = "none";
  document.getElementById("camionetaFields").style.display = "none";
  document.getElementById("tractocamionFields").style.display = "none";

  if (selectedOption === "1") {
    document.getElementById("autoFields").style.display = "block";
  } else if (selectedOption === "2") {
    document.getElementById("camionetaFields").style.display = "block";
  } else if (selectedOption === "3") {
    document.getElementById("tractocamionFields").style.display = "block";
  }
}
</script>
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