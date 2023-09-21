<?php 
 
final class ClaseBase { 
public function test() { 
echo "ClaseBase::test() llamada\n"; 
} 
// Aquí da igual si se declara el método como 
// final o no final 

public function moreTesting() { 
echo "ClaseBase::moreTesting() llamada\n"; 
} 
} 
 
class ClaseHijo extends ClaseBase { } 
 
//EL error se refiere a que no es posible heredar de la ClaseBase
// ya que esta es final, por lo que no se puede heredar de este tipo de clases.

?> 