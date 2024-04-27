<style>
  .fondoAdm
  {
    background-image: linear-gradient(90deg, #ffffff 31%, #7cb8ea 100%);
  }
</style>
<body class="fondoAdm">
<div class="row">
    <div class="col-6">
        <form method="post" action="home">
            Empleado <input type="text" name="txtEmpleado" placeholder="Nombre Empleado" class="form-control"> 
            Usuario <input type="text" name="txtUser" placeholder="Nombre de Usuario" class="form-control">
            Contraseña <input type="number" name="txtPass" placeholder="Contraseña" class="form-control">
<div class="mt-1">
  <label>Tipo de vehiculo</label>
  <select class="form-select">
    <option selected>Selecciona...</option>
    <option value="admin">Administrador</option>
    <option value="usuario">Usuario</option>
  </select>
</div>
            <button class="btn btnAdm mt-3">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <?php echo $resultado; ?>
    </div>
</div>
</body>