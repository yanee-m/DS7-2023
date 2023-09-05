<html>

<head>
  <title>
    Laboratorio 2.7
  </title>
</head>

<body>
  <?php
  $posicion = "Arriba";

  switch ($posicion) {
    case "Arriba":
      echo "La variable contiene ";
      echo "el valor Arriba";
      break;
    case "Abajo":
      echo "La variable contiene ";
      echo "el valor Abajo";
      break;
    default:
      echo "La variable contiene ";
      echo "un valor distinto a Arriba y Abajo";
      break;
  }
  ?>
</body>

</html>