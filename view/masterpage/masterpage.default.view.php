<!DOCTYPE html>
<html>
<head>
  <title>Componentes</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css"
  href="dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"
  href="css/propio.css">
  <script src="dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="alert alert-success">
    <a href="home">Inicio</a>  
    Mi página Maestra
  </div>
  <nav>
    <a href="Uno">Opción 1</a>
    <a href="Dos">Opción 2</a>
    <a href="Monedas">Conversor</a>
  </nav>
  <div><?php echo $view_content; ?></div>
</body>
</html>