<html>
  <head>
    <title> Laboratorio 20.1</title>
  </head>
</html>

<body>
  <form action="lab201.php" method="post">
    Nombre: <input type="text" name="nombre" required/><br>
    Apellido: <input type="text" name="apellido" required /><br>
    Email: <input type="text" name="email"><br>
    Edad: <input type="number" name="edad" min="0" max="120" /><br><br>
    <input type="submit" value="Guardar Datos"/>
  </form>
  <?php
    include("UsuariosMDB.php");
    $usrs = new UsuariosMDB();

    if(array_key_exists("guardar", $_POST)){
      $usrs->insertarRegistro($_REQUEST["nombre"], $_REQUEST["apellido"], $_REQUEST["email"], $_REQUEST["edad"]);
      echo "Usuario guardado exitosamente";
    }
    echo "Registros en la Coleccion Usuarios: <br>";
    $usrs->obtenerRegistros()
  ?>
</body>