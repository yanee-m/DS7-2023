<?php
require_once('config.php');

class usuarios extends modeloCredencialesBD{
    public function __construct(){
        parent::__construct();
    }

    public function validar_usuario($usr,$pwd){
    $instruccion= "CALL sp_validar_usuario('".$usr."','".$pwd."')";
    $consulta= $this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
    if($resultado){
        return $resultado;
        $this->_db->close();
    }
}
}
?>
