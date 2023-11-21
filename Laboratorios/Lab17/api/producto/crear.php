<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../configuracion/conexion.php';
include_once '../objetos/producto.php';

$conex = new Conexion();
$db = $conex->obtenerConexion();

$producto = new Producto($db);

$data = json_decode(file_get_contents("php://input"));

if(
  !empty($data->nombre) &&
  !empty($data->precio) &&
  !empty($data->descripcion) &&
  !empty($data->categoria_id)
){
  $producto->nombre = $data->nombre;
  $producto->precio = $data->precio;
  $producto->descripcion = $data->descripcion;
  $producto->categoria_id = $data->categoria_id;
  $producto->creado = date('Y-m-d H:i:s');

  if($producto->crear()){
    http_response_code(201);
    echo json_encode(array("mensaje" => "Producto creado exitosamente."));
  }else{
    http_response_code(503);
    echo json_encode(array("mensaje" => "No se pudo crear el producto."));
  }}
  else {
    http_response_code(400);
    echo json_encode(array("mensaje" => "No se pudo crear el producto. Datos incompletos."));
  }
?>