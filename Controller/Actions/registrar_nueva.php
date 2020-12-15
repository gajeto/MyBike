<?php
session_start();
require_once (__DIR__."/../MDB/BicicletaMDB.php");
require_once (__DIR__."/../../Model/Entities/Bicicleta.php");
$home = "..";


$errMsg = 'OK';

$id = 1;
$estado = $_POST['estado'];
	if ($estado != NULL) {
		$estado = "Robada";
	}else{
		$estado = "Nueva";
	}
$nombre = $_POST['nombre'];
$serial = $_POST['serial'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color_p = $_POST['color_p'];
$color_s = $_POST['color_s'];
$tipo = $_POST['tipo'];
$valor = $_POST['valor'];
$info = $_POST['info'];


$bike = new Bicicleta($id,$estado,$serial, $nombre,$marca,$modelo,$color_p,$color_s,$tipo,$valor, $info);
$operacion = insertarBicicleta($bike);

if($operacion != NULL){
    header("Location: ../../View/garaje.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    $errMsg .= 'Usuario y/o contraseña no válido';
    header("Location: ../../View/index.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

