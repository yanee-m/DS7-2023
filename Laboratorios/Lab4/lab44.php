<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laboratorio 4.4</title>
</head>

<body>
  <P>Ingrese la Cantidad de Datos</P>
  <form action="lab44.php" method="post">
    <input type="number" name="num">
    <button type="submit" name="cantidad">Enviar</button>
  </form>
  <?php
  if (array_key_exists('cantidad', $_POST)) {
    print "<form action='Lab44.php' method='post'>";
    print "<h2>Ingrese " . $_POST['num'] . " Numeros Par</h2>";

    for ($i = 0; $i < $_POST['num']; $i++) {
      echo "</br>";
      print "<p>Valor " . ($i + 1) . " </P><input type='number' name='val$i'>";
    }
    echo "</br>", "</br>";
    print "<button type='submit' name='valores'>Enviar</button>";
    print "</form>";
  } else if (array_key_exists('valores', $_POST)) {
    echo "</br>", "</br>";
    echo "<h4>Numeros Ingresados</h4>";
    foreach ($_POST as $key) {
      if ((intval($key) % 2) == 0) {
        echo "</br>";
        print $key;
      } else {
        header("location:lab44.php");
      }
    }
  }
  ?>
</body>

</html>