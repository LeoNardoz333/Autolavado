<style>
  .fondoAdm
  {
    background-image: linear-gradient(90deg, #ffffff 31%, #7cb8ea 100%);
  }
</style>
<body class="fondoAdm">
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="rvehiculos">
            Clasificacion <input type="text" name="txtClasificacion" placeholder="Tipo de vehiculo" class="form-control"> 
            Unidad <input type="text" name="txtUnidad" placeholder="Unidad en la cual se cobrara el vehiculo" class="form-control">
            Costo <input type="number" name="txtValor" placeholder="Costo de servicio por medida" class="form-control">
            <button type="submit" class="btn btnAdm mt-3">
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
    if(isset($_SESSION['alertaAuto'])) {
        if($_SESSION['alertaAuto'] != 'umu')
        {
            echo '<script>alert("' . $_SESSION['alertaAuto'] . '");</script>';
            unset($_SESSION['alertaAuto']);
        }
}
?>
</body>