<?php
		//Lab 4.2
		class Factorial {  
      protected $numero; 
		  public $i;
		  protected $factorial;
 
		  function __construct($num,$i,$f) {  
			    $this->numero = $num;  
			    $this->i = $i;
			    $this->factorial = $f;
		    } 
 
		  function calc_factorial() {  
			  while ($this->i <= $this->numero) {
				    $this->factorial = $this->i*$this->factorial;
		        $this->i = $this->i+1;
			    }
				return $this->factorial;
		}
	}


  //Lab 4.3
	class MayorArreglo {
			protected $elements = array();
	
			public function __construct($size) {
					while (sizeof($this->elements) != $size) {
							$rand = random_int(1, 99);
							if (!in_array($rand, $this->elements, true)) {
									$this->elements[] = $rand;
							}
					}
			}
	
			function mostrarElementos() {
					return $this->elements;
			}
	
			function mostrarMayor() {
					return max($this->elements);
			}
	
			function mostrarIndiceMayor() {
					return array_search($this->mostrarMayor(), $this->elements);
			}
	}
	

  //Lab 4.5

  class Matriz { 
		protected $long;  
		
		function __construct($l) {  
			$this->long = $l;  
		} 
 
		function generar_matriz() {
			echo '<table border="1">';
			for ($fila = 1; $fila <= $this->long; $fila++) {
					echo '<tr>';
					for ($columna = 1; $columna <= $this->long; $columna++) {
							echo '<td>';
							if ($fila == $columna) {
									echo 1;
							} else {
									echo 0;
							}
							echo '</td>';
					}
					echo '</tr>';
			}
			echo '</table>';
	}	
}
?>