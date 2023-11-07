<?php
session_start();
?>

<html lang="es">

<head>
  <title>Desconectar</title>
  <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</head>

<body>
  <?php
  if (isset($_SESSION["usuario_valido"])) {
    session_destroy();
    print("<br><br><p align='center'> Conexion Finalizada</p>\n");
    print("<p align = 'center'>[ <a href='login.php'>Conectar </a>]</p>\n");
  } else {
    print("<br><br>\n");
    print("<p align='center'> NO EXISTE UNA CONEXION ACTIVA </P>\n");
    print("<p align='center'>[<a href = 'login.php'>Conectar </a>]</p>\n");
  }
  ?>
</body>
</html>