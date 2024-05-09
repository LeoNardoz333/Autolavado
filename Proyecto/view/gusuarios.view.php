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
<body class="fondoAdm">
    <div class="row" style="width: 1100px; padding">
        <div class="col-6" id="x">
            <form id="userForm" method="post" action="rusuarios">
                Empleado <input type="text" name="name" placeholder="Nombre Empleado" class="form-control">
                Usuario <input type="text" name="username" placeholder="Nombre de Usuario" class="form-control">
                Contraseña <input type="password" name="pass" placeholder="Contraseña" class="form-control" minlength="3" maxlength="15">
                <div class="mt-1">
                    <label>Permisos</label>
                    <select class="form-select" name="permisos">
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
    <script>
        document.getElementById("userForm").addEventListener("submit", function (event) {
            var name = document.getElementsByName("name")[0].value;
            var username = document.getElementsByName("username")[0].value;
            var pass = document.getElementsByName("pass")[0].value;
            var permisos = document.getElementsByName("permisos")[0].value;

            if (name.trim() === "") {
                alert("Por favor, ingresa el nombre del empleado.");
                event.preventDefault();
            } else if (username.trim() === "") {
                alert("Por favor, ingresa el nombre de usuario.");
                event.preventDefault();
            } else if (pass.trim() === "" || pass.length < 3 || pass.length > 15) {
                alert("Por favor, ingresa una contraseña válida (entre 3 y 15 caracteres).");
                event.preventDefault();
            } else if (permisos === "Selecciona...") {
                alert("Por favor, selecciona un permiso.");
                event.preventDefault();
            }
        });
    </script>
</body>



