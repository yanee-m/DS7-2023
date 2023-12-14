<?php
require_once('config.php');
class parcial2 extends ConeccionBD
{

    public function __construct()
    {
        parent::__construct();
    }

    public function guardar_resultado($n, $result, $factorial)
    {
      $instruccion = "CALL guardar('" . $n . "','" . $result . "','" . $factorial . "')";
      $resultado = $this->_db->query($instruccion);
  
      if ($resultado) {
        return $resultado;
        $resultado->close();
        $this->db->close();
      }
    }

    public function listar_resultado()
    {
        $instruccion = "CALL listar()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if ($resultado) {
            return $resultado;
            $resultado->close();
            $this->db->close();
        }
    }


}
