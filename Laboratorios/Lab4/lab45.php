<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laboratorio 4.5</title>
</head>

<body>
  <form action="lab45.php" method="post">
    <input type="number" name="num" id="">
    <button type="submit" name="send">Enviar</button>
  </form>
  <?php
  if (array_key_exists("send", $_POST)) {
    if (intval($_POST["num"]) % 2 == 0) {
      $tam = intval($_POST['num']);
      for ($i = 0; $i < $tam; $i++) {
        for ($j = 0; $j < $tam; $j++) {
          if ($i == $j) {
            echo 1;
          } else {
            echo 0;
          }
        }
        echo "</br>";
      }
    } else {
      header('location: lab45.php');
    }
  }
  ?>
</body>

</html>