<style>
  .fondoAdm
  {
    background-image: linear-gradient(90deg, #ffffff 31%, #7cb8ea 100%);
  }
</style>
<body class="fondoAdm">
<div class="row">
    <div class="col-6" id="x">
        <form method="post" action="rusuarios">
            Empleado <input type="text" name="name" placeholder="Nombre Empleado" class="form-control"> 
            Usuario <input type="text" name="username" placeholder="Nombre de Usuario" class="form-control">
            Contraseña <input type="number" name="pass" placeholder="Contraseña" class="form-control">
<div class="mt-1">
  <label>Permisos</label>
  <select class="form-select" name ="permisos">
    <option selected>Selecciona...</option>
    <option value="admin">Administrador</option>
    <option value="usuario">Usuario</option>
  </select>
</div>
            <button type="submit" class="btn btnAdm mt-3">
                Guardar
            </button>
        </form>
    </div>
    <div class="col-6">
        <?php echo $resultado; ?>
    </div>
</div>
</body>