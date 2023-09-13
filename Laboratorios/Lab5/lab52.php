<?php

$tipo = $_FILES["nombre_archivo_cliente"]["type"];
$admitidos = ["jpg", "jpeg", "gif", "png"];
$valido = 0;

define('TAM', 1048576);

for ($i = 0; $i < 4; $i++) {
  if ($_FILES["nombre_archivo_cliente"]["type"] != "image/$admitidos[$i]") {
    $valido = 0;
  } else {
    $valido = 1;
    $i = 4;
    if ($_FILES["nombre_archivo_cliente"]["size"] > TAM) {
      echo ("El tipo de archivo excede 1 MB");
    } else {
      if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
        $nombreDirectorio = "archivos";
        $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
        $nombreCompleto = $nombreDirectorio . $nombrearchivo;
        if (is_file($nombreCompleto)) {
          $idUnico = time();
          $nombrearchivo = $idUnico . "-" . $nombrearchivo;
          echo "Archivo repetido, se cambiara el nombre a $nombrearchivo<br><br>";
        }
        move_uploaded_file(
          $_FILES['nombre_archivo_cliente']['tmp_name'],
          $nombreDirectorio . $nombrearchivo
        );

        echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
      } else {
        echo "No se ha podido subir el archivo <br>";
      }
    }
  }
}
if ($valido == 0) {
  echo ("El tipo de archivo no es tipo imagen. Debe subir un archivo de tipo JPG, JPEG, GIF o PNG");
}
?>