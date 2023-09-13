<html>
<center>
    <?php
    $numero = $_POST['numero'];

    $factorial = 1;
        for ($i = 1; $i <= $numero; $i++) {
        $factorial = $factorial * $i;
        }

    print '<h2>El Factorial es = ' . $factorial . '</h2>';
    ?>
</center>
</html>