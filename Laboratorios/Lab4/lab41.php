<!DOCTYPE html>
<html lang="es">

<head>
  <title>Laboratorio 4.1</title>
</head>

<body>
  <center>
    <h1>Ingrese su Porcentaje de Ventas</h1>
    <form action="lab41.php" method="post">
      <input type="text" name="ventas" id="">
      <button type="submit" name="send">Enviar</button>
    </form>
    <br />
    <br />
    <?php
    if (array_key_exists('send', $_POST) && $_POST['ventas'] > 0) {
      print '<h1>Su rendimiento a sido</h1>';
      if ($_REQUEST['ventas'] >= 80) {
        print '<img src="./Imagenes/Excelente.png" alt="" srcset="">';
      } else if ($_REQUEST['ventas'] >= 50 && $_REQUEST['ventas'] <= 79) {
        print '<img src="./Imagenes/Intermedio.png" alt="" srcset="">';
      } else {
        print '<img src="./Imagenes/Malo.png" alt="" srcset="">';
      }
    }
    ?>
  </center>
</body>

</html>