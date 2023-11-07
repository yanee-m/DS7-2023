<html lang="es">

<head>
  <link rel="stylesheet" href="css/estilo.css" type="text/css">
  <title>Laboratorio 13</title>
</head>

<body>
  <h1>Recuperar valor de una cookie</h1>
  <?php
  if (isset($_COOKIE['user'])) {
    echo "<h2>Bienvenido " . $_COOKIE['user'] . "!</h2><br/>";
  } else {
    echo "<h2>Bienvenido invitado</h2><br>";
  }
  ?>

  <a href="lab131.php">...Regresar</a>
  <a href="lab134.php">Continuar...</a>
</body>

</html>