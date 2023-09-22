<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Parcial 1 - Resultado Matriz</title>
</head>

<body>
  <?php

  //Validación del formulario y que sea un número impar
  if (isset($_POST['n'])) {
    $n = intval($_POST['n']);
    if ($n % 2 == 0) {
      echo "<p>Debe ingresar un valor impar</p>";
    } else {
      //Proceso para la creación de la matriz
      $matriz = array();
      for ($i = 0; $i < $n; $i++) {
        $valor = array();
        for ($j = 0; $j < $n; $j++) {
          if ($i == $j) {
            $valor[] = rand(101, 200);
          } else {
            $valor[] = 0;
          }
        }

        //Reordena el array para mostrarlo en diagonal inversa
        array_unshift($matriz, $valor);
      }

      // Imprimir la Matriz
      echo "<h2>Matriz Diagonal Inversa</h2>";
      echo "<table border='1'>";
      for ($i = 0; $i < $n; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $n; $j++) {
          echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
      
      //Proceso para calcular la suma de las diagonales
      $sumDiagPrin = 0;
      $sumDiagInv = 0;
      for ($i = 0; $i < $n; $i++) {
        $sumDiagPrin += $matriz[$i][$i];
        $sumDiagInv += $matriz[$i][$n - $i - 1];
      }

      // Mostrar las sumas
      echo "<p>Suma de la diagonal principal: $sumDiagPrin</p>";
      echo "<p>Suma de la diagonal inversa: $sumDiagInv</p>";
    }
  }
  ?>
  <a href="parcial1.html">Volver</a>
</body>

</html>