<HTML LANG="es">

<HEAD>
  <TITLE>Laboratorio 11.1</TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>

<BODY>
  <H1>Consulta de noticias</H1>
  <?PHP
  require_once("class/noticias.php");
  $obj_noticia = new noticia();
  $limite = 0;
  $noticias = $obj_noticia->consultar_noticias();
  $nfilas = count($noticias);
  $a = 1;
  $b = 5;
  $cinco = 5;
  if (isset($_REQUEST['a']) && isset($_REQUEST['b']) && isset($_REQUEST['limite'])) {
    $a = $_REQUEST['a'];
    $b = $_REQUEST['b'];
    $limite = $_REQUEST['limite'];
  }
  $obj_noticia = new noticia();
  $noticias_new = $obj_noticia->consultar_noticias_5($limite);
  if ($b > $nfilas) {
    $tempo = $b;
    $b = $nfilas;
  }
  if ($nfilas == 0) {
    $a = $nfilas;
  }
  if ($nfilas <= 5) {
    print("Mostrando noticias " . $a . " a " . $b . " de un total de " . $nfilas . ". [ Anterior | Siguente ]\n");
  }
  if ($a > 1 && $b < $nfilas) {
    print("Mostrando noticias " . $a . " a " . $b . " de un total de " . $nfilas . ". [ <A HREF=lab111.php?a=" . $a = $a - $cinco . "&b=" . $b = $b - $cinco . "&limite=" . $limite = $limite - $cinco . ">Anterior | <A HREF=lab111.php?a=" . $a = $a + $cinco . "&b=" . $b = $b + $cinco . "&limite=" . $limite = $limite + $cinco . ">Siguente</A> ]  \n");
  } else {
    if ($a == 1) {
      print("Mostrando noticias " . $a . " a " . $b . " de un total de " . $nfilas . ". [ Anterior | <A HREF=lab111.php?a=" . $a = $a + $cinco . "&b=" . $b = $b + $cinco . "&limite=" . $limite = $limite + $cinco . ">Siguente</A> ]  \n");
    }
  }

  if ($b == $nfilas) {
    print("Mostrando noticias " . $a . " a " . $b . " de un total de " . $nfilas . ". [ <A HREF=lab111.php?a=" . $a = $a - $cinco . "&b=" . $tempo = $tempo - $cinco . "&limite=" . $limite = $limite - $cinco . ">Anterior</A> | Siguente ]\n");
  }
  if ($nfilas > 0) {
    print("<TABLE>\n");
    print("<TR>\n");
    print("<TH>Titulo</TH>\n");
    print("<TH>Texto</TH>\n");
    print("<TH>Categoria</TH>\n");
    print("<TH>Fecha</TH>\n");
    print("<TH>Imagen</TH>\n");
    print("</TR>\n");
    foreach ($noticias_new as $resultado) {
      print("<TR>\n");
      print("<TD>" . $resultado['titulo'] . "</TD>\n");
      print("<TD>" . $resultado['texto'] . "</TD>\n");
      print("<TD>" . $resultado['categoria'] . "</TD>\n");
      print("<TD>" . date("j/n/Y", strtotime($resultado['fecha'])) . "</TD>\n");

      if ($resultado['imagen'] != "") {
        print("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] . "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
      } else {
        print("<TD>&nbsp;</TD>\n");
      }
      print("</tr>\n");
    }
    print("</TABLE>\n");
  } else {
    print("No hay noticias disponibles");
  }
  ?>
</BODY>

</HTML>