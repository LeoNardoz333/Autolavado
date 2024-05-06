<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #93C3CE 0%, #D3E6EA 89%);
  }
</style>
<body class="fondo4">
<div>
    <img style="max-width: 70px; height: auto; display: inline-block; vertical-align: middle;" src="images/alavado.png">
    <h2 style="color: navy; padding-left: 100px; display: inline-block; margin-left: 10px;">Registro Usuarios</h2>
</div>
<div class="header-left">
</div>
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="rusuarios">
						<br>
						<div class="form-group">
						<label for="name" class="cols-sm-2 control-label" style="font-size: larger; font-weight: bold;">Empleado</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Empleado"/>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label for="username" class="cols-sm-2 control-label" style="font-size: larger; font-weight: bold;">Usuario</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Usuario"/>
								</div>
							</div>
						</div>
						<div class="form-group">
						<label for="pass" class="cols-sm-2 control-label" style="font-size: larger; font-weight: bold;">Contraseña</label>
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
							<a href="login" class="btn btn-danger btn-lg mt-3">Cancelar</a>
						</div>
    </div>
    <div class="col-6">
        <?php #echo $resultado; ?>
    </div>
</div>
</body>