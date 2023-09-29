<?php
$long = $_POST['num'];
if ($long % 2 != 0) {
  echo ("Solo ingresar Numeros Pares");
?>

  <title> Laboratorio 8.3 </title>
  <form method='post' action='lab83.html'>
    <input type='submit' name='' value='Regresar'>
  </form>

<?php
} else {
  include('class_lib.php');
  $matriz = new Matriz($long);
  $resul = $matriz->generar_matriz();
}
?>

<title> Laboratorio 8.3 </title>
<form method='post' action='Lab83.html'>
  <input type='submit' name='' value='Inicio'>
</form>