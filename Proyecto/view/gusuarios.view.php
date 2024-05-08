<style>
  .fondoAdm
  {
    background-image: linear-gradient(90deg, #93C3CE 0%, #D3E6EA 89%)
  }
  .btn-cus {
    width: 20%;
    margin-bottom: 15px;
		margin-left: 220px;
    }
</style>
<body class="fondoAdm">
<div class="row"style="width: 1100px; pading">
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