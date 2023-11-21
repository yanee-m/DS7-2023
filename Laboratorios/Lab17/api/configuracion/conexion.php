<?php

class Conexion {
  private $host="localhost";
  private $db_name="productos_api";
  private $username="root";
  private $password="";
  public $conn;
  
  //obtenerlaconexiondelabasededatos
  public function obtenerConexion(){
    $this->conn=null;
    try {
      $this->conn=new PDO("mysql:host=".$this->host.";dbname=".
      $this->db_name,
      $this->username,
      $this->password);
      $this->conn->exec("set names utf8");}
      catch(PDOException$exception){
        echo"Error de conexion a base de datos: ".$exception->getMessage();}
        return$this->conn;
  }}
?>
