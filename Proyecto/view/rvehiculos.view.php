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
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="rvehiculos"style="font-size: larger; font-weight: bold;">
            Clasificacion <input type="text" name="txtClasificacion" placeholder="Tipo de vehiculo" class="form-control"> 
            Unidad <input type="text" name="txtUnidad" placeholder="Unidad en la cual se cobrara el vehiculo" class="form-control">
            Costo <input type="number" name="txtValor" placeholder="Costo de servicio por medida" class="form-control">
            <button type="submit" class="btn btnAdm btn-cus mt-3">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <?php echo $resultado; ?>
    </div>
</div>
</body>