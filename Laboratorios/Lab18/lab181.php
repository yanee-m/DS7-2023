<?php

require_once('modelo.php');

function verificar_password_strenght($contrasena) {
  if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $contrasena)) {
    echo "La contraseña es segura.";
  } else {
    echo "La contraseña no es segura.";
  }
}

function verificar_email($email) {
  if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/", $email)) {
    return true;
  } else {
    return false;
  }
}

function verificar_ip($ip) {
  return preg_match("/^([1-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])" . 
  "(\.([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])){3}$/", $ip);
}


$errores = [];

if (empty($_POST['nombre'])) {
  $errores['nombre'] = 'El campo "nombre" es obligatorio.';
}

if (empty($_POST['apellido'])) {
  $errores['apellido'] = 'El campo "apellido" es obligatorio.';
}

if (empty($_POST['email'])) {
  $errores['email'] = 'El campo "email" es obligatorio.';
} else if (!verificar_email($_POST['email'])) {
  $errores['email'] = 'La dirección de email no es válida.';
}

if (empty($_POST['contrasena'])) {
  $errores['contrasena'] = 'El campo "contraseña" es obligatorio.';
} else if (!verificar_password_strenght($_POST['contrasena'])) {
  $errores['contrasena'] = 'La contraseña no es segura. Debe tener al menos 8 caracteres, al menos una letra mayúscula, al menos una letra minúscula y al menos un número.';
}

if ($_POST['contrasena'] != $_POST['repetir-contrasena']) {
  $errores['contrasena-repetir'] = 'Las contraseñas no coinciden.';
}

// Si hay errores, los mostramos en pantalla

if (!empty($errores)) {
  foreach ($errores as $campo => $mensaje) {
    echo '<p id="' . $campo . '-error">' . $mensaje . '</p>';
  }
} else {

  // Encriptación de la contraseña

  $contrasena_encriptada = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

  // Inserción de los datos del usuario en la base de datos

  $sql = "INSERT INTO usuarios (nombre, apellido, email, contrasena, ip) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['apellido'] . "', '" . $_POST['email'] . "', '" . $contrasena_encriptada . "', '" . $_POST['ip'] . "')";
  $resultado = $conexion->query($sql);

  // Si se insertó correctamente el usuario, se muestra un mensaje de éxito

  if ($resultado) {
    echo '<p>El usuario se ha registrado correctamente.</p>';
  } else {
    echo '<p>Se ha producido un error al registrar el usuario.</p>';
  }

}

// Cierre de la conexión a la base de datos

$conexion->close();

?>
