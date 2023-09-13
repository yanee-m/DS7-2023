<?php
$precio1 = $_POST['precio1'];
$precio2 = $_POST['precio2'];
$precio3 = $_POST['precio3'];
$media = ($precio1+$precio2+$precio3)/3;
echo "<br/> DATOS RECIBIDOS";
echo "<br/> Precio del producto en establecimiento 1 : ". $precio1. " dolares";
echo "<br/> Precio del producto en establecimiento 2 : ". $precio2. " dolares";
echo "<br/> Precio del producto en establecimiento 3 : ". $precio3. " dolares <br/>";
echo "<br/> El Precio medio del producto es de : ". $media. " dolares";
?>