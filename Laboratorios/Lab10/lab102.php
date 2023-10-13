<HTML LANG="es">
    <HEAD>
        <TITLE> Laboratorio 10.2 </TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css"> 
    </HEAD>
<H1> Encuesta. Resultado de la votacion </H1>
<BODY>

    <?php
    require_once("class/votos.php");

    $obj_votos = new votos();
        $result_votos = $obj_votos->listar_votos();

        foreach ($result_votos as $result_votos){
            $votos1=$result_votos['votos1'];
            $votos2=$result_votos['votos2'];
        }
        $totalVotos = $votos1 + $votos2;

        print ("<TABLE>\n");

        print ("<TR>\n");
        print ("<TH> Respuestas</TH>\n");
        print ("<TH>Votos</TH>\n");
        print ("<TH>Porcentaje</TH>\n");
        print ("<TH>Representacion Grafica</TH>\n");
        print ("</TR>\n");

        $porcentaje = round (($votos1/$totalVotos)*100,2);
        print ("<TR>\n");
        print ("<TD CLASS='izquierda'>Si</TD>\n");
        print ("<TD CLASS='derecha'>$votos1</TD>\n");
        print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");
        print ("</TR>\n");
        $porcentaje = round (($votos2/$totalVotos)*100,2);
        print ("<TR>\n");
        print ("<TD CLASS='izquierda'>No</TD>\n");
        print ("<TD CLASS='derecha'>$votos2</TD>\n");
        print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print ("<TD CLASS='izquierda' WIDTH='400'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='".$porcentaje*4 . "'></TD>\n");
        print ("</TR>\n");

        print ("</TABLE>\n");
        print("<P> Numero total de votos emitidos: $totalVotos</P>\n");
        print("<P><A HREF='lab101.php'>Pagina de Votacion</A></P>\n");
?>
</BODY>
    </HTML>
