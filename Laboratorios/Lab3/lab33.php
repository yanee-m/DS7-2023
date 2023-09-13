<!DOCTYPE html>
<html lang="es">

<head>
  <title>Laboratorio 3.3</title>
</head>

<body>
  <?php
  if (array_key_exists("enviar", $_POST)) {
    if ($_REQUEST['apellido'] != "") {
      echo "El apellido ingresado es: $_REQUEST[apellido]";
    } else {
      echo "Favor coloque el apellido";
    }
    echo "<br>";
    if ($_REQUEST['nombre'] != "") {
      echo "El nombre ingresado es: $_REQUEST[nombre]";
    } else {
      echo "Favor coloque el nombre";
    }
  } else {
  ?>
    <form action="lab33.php" method="POST">
      Nombre: <input type="text" name="nombre"><br>
      Apellido: <input type="text" name="apellido"><br>
      <input type="submit" name="enviar" value="Enviar Datos">
    </form>
  <?php } ?>
</body>

</html>