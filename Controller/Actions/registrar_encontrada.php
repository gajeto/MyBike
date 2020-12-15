<?php
session_start();
require_once (__DIR__."/../MDB/EncontradaMDB.php");
require_once (__DIR__."/../../Model/Entities/Encontrada.php");
$home = "..";


$errMsg = 'OK';

$id = 10;
$e_serial= $_POST['e_serial'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color1 = $_POST['color1'];
$color2 = $_POST['color2'];
$codigo = $_POST['codigo'];
$tipo = $_POST['tipo'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$info_lugar = $_POST['info_lugar'];
$foto = 'foto';
$detalles = $_POST['detalles'];
$email = $_POST['email'];

$bike = new Encontrada($id,$e_serial,$marca,$modelo,$color1,$color2,$codigo,$tipo,$fecha,$lugar,$info_lugar,$foto,
						$detalles,$email);
$operacion = insertarEncontrada($bike);

if($operacion != NULL){
    header("Location: ../../View/bicicletas_encontradas.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    header("Location: ../../View/index.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

