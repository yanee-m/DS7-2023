<?php
if (array_key_exists('enviar', $_POST)) {
  $expire = time() + 60 * 5;
  setcookie("user", $_REQUEST['visitante'], $expire);
  header("Refresh:0");
}
?>

<html lang="es">

<head>
  <link rel="stylesheet" href="css/estilo.css" type="text/css">
  <title>Laboratorio 13</title>
</head>

<body>
  <h1>Creacion de cookies</h1>
  <h2>La cookie de "User" tendra solo 5 minutos de duracion</h2>
  <?php
  if (isset($cookie['user'])) {
    print("<b/>Hola<b>" . $_COOKIE['user'] . "</b> gracias por visitar nuestro sitio web<b/>");
  } else {
  ?>
    <form action="lab132.php" method="post">
      <br>Hola, la primera vez que te vemos por nuestro sitio web, ¿Como te llamas?
      <input type="text" name="visitante">
      <input type="submit" value="Gracias por identificarte" name="enviar">
    </form>
  <?php
  }
  ?>
  <br /><a href="lab133.php">Continuar...</a>
</body>

</html>