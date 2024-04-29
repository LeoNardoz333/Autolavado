<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #000042 0%, #4567e4 89%);
  }
</style>
<body class="fondo4">
<div>Menu de reportes</div>
<div class="header">
			<div class="container">
				<div class="row">
				<div class="header-left">
							<img src="images/alavado.png">
				</div>
					<div class="col-6">
						<div class="menu">
							<form method="post" action="reportes">
    							<button type="submit" name="reporte" value="pagos" 
								class="btn btn-primary mt-3">Reporte Pagos</button>

    							<button type="submit" name="reporte" value="servicios" 
								class="btn btn-primary mt-3">Reporte Servicios</button>

    							<button type="submit" name="reporte" value="empleados" 
								class="btn btn-primary mt-3">Reporte Empleados del día</button>
							</form>
						</div>
						 <form method="post" action="reportes">
							<button type="submit" name="imprimir" value="1"
							class="btn btn-success mt-3">Imprimir</button>
						 </form>
					</div>
					<div class="col-6">
  						<?php echo $resultado; ?>
					</div>
				</div>
			</div>
</div>
</body>