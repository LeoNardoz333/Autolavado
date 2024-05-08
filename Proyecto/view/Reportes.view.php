<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #93C3CE 0%, #D3E6EA 89%);
	margin: 0;
	padding: 0;
  }
  .btn-custom {
        width: 80%;
        margin-bottom: 10px;
    }
	.btn-cus {
        width: 60%;
        margin-bottom: 15px;
		margin-left: 30px;
    }
</style>
<body class="fondo4"style="margin: 0; padding: 0;">
    <div>
        <h2 style="color: navy; padding-left: 20px; display: inline-block; margin-left: 10px;">Registro Clientes</h2>
    </div>
    <div class="header">
	<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="menu">
                <form method="post" action="reportes">
                    <button type="submit" name="reporte" value="pagos" class="btn btn-primary btn-custom mt-3">Reporte Pagos</button> <br>

                    <button type="submit" name="reporte" value="servicios" class="btn btn-primary btn-custom mt-3">Reporte Servicios</button><br>

                    <button type="submit" name="reporte" value="empleados" class="btn btn-primary btn-custom mt-3">Reporte Empleados del día</button>
                </form>
            </div>
            <form method="post" action="reportes">
                <button type="submit" name="imprimir" value="1" class="btn btn-success btn-cus mt-3">Imprimir</button>
            </form>
        </div>
        <div class="col-6">
            <?php echo $resultado; ?>
        </div>
    </div>
</div>
    </div>
</body>
