<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/estilo.css" type="text/css">
  <title>Laboratorio 14</title>
</head>

<body>
  <?php
  if (isset($_SESSION['usuario_valido'])) {
  ?>
    <h1>Consulta de Noticias</h1>
    <?php
    require_once("class/noticias.php");
    $obj_noticia = new noticia();
    $noticias = $obj_noticia->consultar_noticias();

    $nfilas = count($noticias);
    if ($nfilas > 0) {
      print("<table>\n");
      print("<tr>\n");
      print("<th>Titulo</th>\n");
      print("<th>Texto</th>\n");
      print("<th>Categoria</th>\n");
      print("<th>Fecha</th>\n");
      print("</tr>\n");

      foreach ($noticias as $resultado) {
        print("<tr>");
        print("<td>" . $resultado['titulo'] . "</td>");
        print("<td>" . $resultado['texto'] . "</td>");
        print("<td>" . $resultado['categoria'] . "</td>");
        print("<td>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</td>");

        if ($resultado['imagen'] != "") {
          print("<td><a TARGET='_blank' HREF='../img/" . $resultado['imagen'] .
            "'><img border='0' src='../img/iconotexto.gif'></a></td>\n");
        } else {
          print("<td>&nbsp;</td>\n");
        }
        print("</tr>\n");
      }
      print("</table>\n");
    } else {
      print("No hay noticias disponibles");
    }
    ?>
    <p>[<a href="login.php">Menu Principal</a>]</p>
  <?php
  } else {
    print("<br></br>\n");
    print("<p align='center'>Acceso no =Autorizado</p>\n");
    print("<p align='center'>[<a href='login.php' target='_top'>Conectar</a>]</p>\n");
  }
  ?>

</body>
</html>