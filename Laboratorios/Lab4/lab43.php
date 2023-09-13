<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laboratorio 4.3</title>
</head>

<body>
  <?php
  $el = array();

  while (sizeof($el) != 20) {
    array_push($el, random_int(1, 99));
    array_unique($el, SORT_NATURAL);
  }
  ?>
  <table border="1">
    <tr>
      <?php
      foreach ($el as $e) {
        echo '<td>' . $e . '</td>';
      }
      ?>
    </tr>
  </table>
  <?php
  for ($i = 0; $i < sizeof($el); $i++) {
    if ($el[$i] == max($el)) {
      print '</br></br></br>';
      echo '<h2>El valor mas alto del arreglo es ' . max($el) . ' y esta en la posicion ' . $i . '</h2>';
    }
  }
  ?>
</body>

</html>