<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
  <title>Laboratorio 12</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  <h1>Manejo de Sesiones</h1>
  <h2>Paso 1: Se crea la variable de sesion y se almacena</h2>
  <?php
  $var = "Ejemplo sesiones";
  $_SESSION['var'] = $var;
  print("<p>Valor de la variable de sesion: $var</p>\n");
  ?>
  <a href="lab122.php">Paso 2</a>
</body>

</html>