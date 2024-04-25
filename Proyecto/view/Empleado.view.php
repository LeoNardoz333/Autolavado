<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #000042 0%, #4567e4 89%);
  }
</style>
<body class="fondo4">
<div>Empleado destacados</div>
<div class="header-left">
	<img src="images/alavado.png">
</div>
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="empleado">
            Nombre <input type="text" name="txtNombre" placeholder="Nombre Empleado" class="form-control"> 
            Total de autos <input type="number" name="txtTAutos" placeholder="Total de autos" class="form-control">
            Numero de clientes <input type="text" name="txtClientes" placeholder="Total de clientes atendidos" class="form-control">
            <button class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <?php echo $resultado; ?>
    </div>
</div>
</body>