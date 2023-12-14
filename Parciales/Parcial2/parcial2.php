<!DOCTYPE html>
<html lang="es">

<head>
  <title>Parcial 2</title>
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
  <h1>Calcular la Sumatoria de N Elementos</h1>
  <form action="parcial2.php" method="post">
    <p>Ingrese valor</p>
    <input type="number" name="valor_n">
    <input type="submit" value="Enviar">
  </form>

<?php
require_once('class/modelo.php');

function factorial($n) {
  $factorial = 1;
  for ($i = 1; $i <= $n; $i++) {
    $factorial *= $i;
  }
  return $factorial;
}

function sumatoria($n, &$resultado) {
  $resultado = 0;
  for ($i = 1; $i <= $n; $i++) {
    $factorial = factorial($i);
    $resultado += $factorial / $factorial+1 ;
  }
}

if (array_key_exists('valor_n', $_POST)) {
  $n = $_POST['valor_n'];
  $resultado = 0;
  sumatoria($n, $resultado);

  $db = new parcial2();
  $db->guardar_resultado($n, $resultado, factorial($n));
}

$db = new parcial2();
$valores = $db->listar_resultado();

if (!empty($valores)) {
?>
  <table>
    <thead>
      <tr>
        <th>Numero</th>
        <th>Factorial</th>
        <th>Resultado</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($valores as $valor) { ?>
        <tr>
          <td><?php print($valor['n']); ?></td>
          <td><?php print($valor['factorial']); ?></td>
          <td><?php print($valor['resultado']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php
} else {
  echo "No hay valores que mostrar";
}
?>

</body>
</html>
