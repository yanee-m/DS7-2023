<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:access");
header("Access-Control-Allow-Methods:GET");
header("Access-Control-Allow-Credentials:true");
header('Content-Type:application/json');


include_once'../configuracion/conexion.php';
include_once'../objetos/producto.php';


$conex = new Conexion();
$db = $conex->obtenerConexion();

$product = new Producto($db);

$product->id = isset($_GET['id']) ? $_GET['id'] : die();

$product->readOne();

if($product->nombre!=null){
  $product_arr=array("id"=>$product->id,
  "nombre"=>$product->nombre,
  "descripcion"=>$product->descripcion,
  "precio"=>$product->precio,
  "categoria_id"=>$product->categoria_id,
  "categoria_desc"=>$product->categoria_desc);
  
  http_response_code(200);
  echo json_encode($product_arr);
}
?>