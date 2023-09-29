<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laboratorio 8.2</title>
</head>

<body>
    <?php
    include("class_lib.php");

    $mayorarreglo = new MayorArreglo(20);
    $elements = $mayorarreglo->mostrarElementos();
    $maxValue = $mayorarreglo->mostrarMayor();
    $maxIndex = $mayorarreglo->mostrarIndiceMayor();
    ?>

    <table border="1">
        <tr>
            <?php
            foreach ($elements as $element) {
                echo '<td>' . $element . '</td>';
            }
            ?>
        </tr>
    </table>

    <br><br>

    <h2>El valor más alto del arreglo es <?php echo $maxValue; ?> y está en la posición <?php echo $maxIndex; ?></h2>

    <br><br>

    <form method='post' action='lab82.php'>
        <input type='submit' name='' value='Volver a Generar'>
    </form>
</body>

</html>