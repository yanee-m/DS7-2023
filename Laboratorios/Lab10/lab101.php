<HTML LANG="es">

<HEAD>
    <TITLE> Laboratorio 10.1 </TITLE>
    <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css"> 
</HEAD>

<BODY>
    <?php

    require_once("class/votos.php");

    if (array_key_exists('enviar', $_POST)) {
        print("<H1> Encuesta. Voto registrado</H1>\n");

        $obj_votos = new votos();
        $result_votos = $obj_votos->listar_votos();

        foreach ($result_votos as $result_votos) {
            $votos1 = $result_votos['votos1'];
            $votos2 = $result_votos['votos2'];
        }
        $voto = $_REQUEST['voto'];
        if ($voto == "si")
            $votos1 = $votos1 + 1;
        else if ($voto == "no")
            $votos2 = $votos2 + 1;

        $obj_votos = new votos();
        $result = $obj_votos->actualizar_votos($votos1, $votos2);

        if ($result) {
            print("<P> Su voto ha sido registrado. Gracias por participar</P>\n");
            print("<A HREF = 'lab102.php'> Ver resultado </A>\n");
        } else {
            print("<A HREF='lab101.php'>Error al actualizar su voto</A> \n");
        }
    } else {
    ?>

        <H1> Encuesta </H1>
        <P>¿ Cree usted que el precio de la vivienda seguira subiendo al ritmo actual? </P>
        <FORM ACTION="Lab101.php" METHOD="POST">
            <INPUT TYPE="RADIO" NAME="voto" VALUE="si" CHECKED> Si <BR>
            <INPUT TYPE="RADIO" NAME="voto" VALUE="no" CHECKED> No <BR><BR>
            <INPUT TYPE="SUBMIT" NAME="enviar" VALUE="votar">
        </FORM>
        <A HREF="lab102.php">Ver resultados</A>
    <?php
    }
    ?>
</BODY>

</HTML>