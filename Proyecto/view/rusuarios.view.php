<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #000042 0%, #4567e4 89%);
  }
</style>
<body class="fondo4">
<div>Registro Usuarios</div>
<div class="header-left">
<img src="images/alavado.png">
</div>
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="rusuarios">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Empleado</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Empleado"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Usuario</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Usuario"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="pass" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="pass" class="form-control" name="pass" id="pass"  placeholder="Contraseña"/>
								</div>
							</div>
						</div>
                        <?php /*
						<div class="form-group">
							<label for="permisos" class="cols-sm-2 control-label">Permisos</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="permisos" id="permisos"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div> */
						?>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg mt-3">Registrar</button>
						</div>
        </form>
    </div>
    <div class="col-6">
        <?php #echo $resultado; ?>
    </div>
</div>
</body>