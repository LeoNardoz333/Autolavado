<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #93C3CE 0%, #93c3ae 89%);
  }
</style>
<body class="fondo4">
  <div class="wrapper fadeInDown d-flex align-items-center justify-content-center">
    <div id="formContent" class="flex-column">
    <div>
      <p><h3 style="color: navy;">Autolavado</h3></p>
    </div>
      <div class="first mt-3 mb-3">
        <img src="images/alavado.png" id="icon" alt="Logo" style="max-width: 100px; height: auto;"/> <br>
      </div>
      <form class="mt-3 mb-3" method="post" action="login" onsubmit="return validarFormulario()">
  <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario">
  <br><br>
  <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña"><br><br>
  <button type="submit" class="btn btn-primary mt-2 mb-2">Iniciar Sesión</button>
  <a href="rusuarios"><button type="button" class="btn btn-info mt-2 mb-2">Registrarse</button></a>
</form>
      <?php
      if(isset($usuario))
      echo '<label style="color: red; display: block;">'.$usuario.'</label><br>';
      ?>
      <div id="formFooter">
        <div id="liveAlertPlaceholder"></div>
        <button type="button" class="btn btn-primary" id="liveAlertBtn">Olvido su contraseña?</button>
        <!-- <a class="underlineHover" href="#">Olvido su contrasena?</a> -->
        </div>
    </div>
  </div>
    <div>
    </div>

    <script>
function validarFormulario() {
  var usuario = document.getElementById('login').value.trim();
  var contrasena = document.getElementById('password').value.trim();

  if (usuario === '' || contrasena === '') {
    alert('Por favor, complete todos los campos.');
    return false;
  }

  return true;
}
</script>