<style>
  .fondo4
  {
    /* background-image: linear-gradient(90deg, #6dd5ed 10%, #4567e4 90%); */
    background-image: linear-gradient(90deg, #000042 0%, #4567e4 89%);
  }
</style>
<body class="fondo4">
  <div class="wrapper fadeInDown d-flex align-items-center justify-content-center">
    <div id="formContent" class="flex-column">
      <div>
        <p>Autolavado</p>
      </div>
      <div class="first mt-3 mb-3">
        <img src="images/alavado.png" id="icon" alt="Logo" />
      </div>
      <form class="mt-3 mb-3" method="post" action="login">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
        <button type="submit" class="btn btn-primary mt-2 mb-2">Iniciar Sesion</button>
        <button type="button" class="btn btn-info mt-2 mb-2">Registrarse</button>
      </form>
      <div id="formFooter">
        <div id="liveAlertPlaceholder"></div>
        <button type="button" class="btn btn-primary" id="liveAlertBtn">Olvido su contraseña?</button>
        <!-- <a class="underlineHover" href="#">Olvido su contrasena?</a> -->
        </div>
    </div>
  </div>
    <div>
      <?php
      echo $usuario;
      ?>
    </div>