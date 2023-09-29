<?php
include('class_lib.php');

$numero = $_POST['num'];
$factorial = 1;
$i = 1;

$fact = new Factorial($numero, $i, $factorial);
$resul = $fact->calc_factorial();
echo "<br/> El Factorial de " . $numero . " es " . $resul;
?>

<title> Laboratorio 8.1 </title>
<form method="post" action="lab81.html">
	<input type="submit" name="" value="Inicio">
</form>