<?php
session_start();
require_once (__DIR__."/../MDB/PerdidaMDB.php");
require_once (__DIR__."/../../Model/Entities/Perdida.php");
$home = "..";


$errMsg = 'OK';

$id = 4;
$serial = "AX65265P";
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$lugar = $_POST['lugar'];
$info_lugar = $_POST['info_lugar'];
$detalles = $_POST['detalles'];
$recompensa = $_POST['recompensa'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


$perdida = new Perdida($id,$serial,$fecha,$hora,$lugar,$info_lugar,$detalles,$recompensa,$nombre,$email,$telefono);
$operacion = insertarPerdida($perdida);

if($operacion != NULL){
    header("Location: ../../View/garaje.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    $errMsg .= 'Usuario y/o contraseña no válido';
    header("Location: ../../View/index.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

