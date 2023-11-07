<?php
session_start();

if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {
  $usuario = $_REQUEST['usuario'];
  $clave = $_REQUEST['clave'];

  $salt = substr($usuario, 0, 2);
  $clave_crypt = crypt($clave, $salt);

  require_once("class/usuarios.php");

  $obj_usuarios = new usuarios();
  $usuario_validado = $obj_usuarios->validar_usuario($usuario, $clave_crypt);

  foreach ($usuario_validado as $array_resp) {
    foreach ($array_resp as $value) {
      $nfilas = $value;
    }
  }

  if ($nfilas > 0) {
    $usuario_valido = $usuario;
    $_SESSION["usuario_valido"] = $usuario_valido;
  }
}
?>

<!DOCTYPE html public "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">

<head>
  <title>Laboratorio 14 - Login al sitio de Noticias</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
  <?php
  //sesion inicada
  if (isset($_SESSION['usuario_valido'])) {
  ?>
    <h1>GESTION DE NOTICIAS</h1>
    <hr>
    <ul>
      <li> <a href="lab142.php">Listar toda las noticias</a> </li>
      <li> <a href="lab143.php">Listar noticias por partes</a></li>
      <li> <a href="lab144.php">Buscar noticia</a></li>
    </ul>
    <hr>
    <p>[ <a href="logout.php">Desconectar</a> ]</p>
  <?php
  }
  //intento de entrada fallido
  else if (isset($usuario)) {
    print("<br><br>\n");
    print("<p align= 'center'>Acceso no autorizado</p>\n");
    print("<p align='center'>[ <a href='login.php'>Conectar</a>]</p>\n");
  }
  //sesion no iniciada
  else {
    print("<br></br>");
    print("<p class='parrafocentrado'>Esta zona tiene el acceso restringido.<br>" . 
      "Para entrar debe identificarse</p>\n");
    print("<form class='entrada' name='login' action='login.php' method='POST'>\n");
    print("<p><label class='etiqueta= entrada'> Usuario:</label>\n");
    print("<input type='text' name='usuario' size='15'></p>\n");
    print("<p><label class='etiqueta-entrada'>Clave:</label>\n");
    print("<input type='password' name='clave' size='15'></p>\n");
    print("<p><input type='submit' value='entrar'></p>");
    print("</form>\n");
    print("<p class='parrafocentrado'> NOTA: si no dispone de identificacion o tiene problemas " .
      "para entrar<br>pongase en contacto con el" .
      "<a href='MALITO:webmaster@localhost'> administrador</a> del sitio</p>\n");
  }

  ?>
</body>
</html>