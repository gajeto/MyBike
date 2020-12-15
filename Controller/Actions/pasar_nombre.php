<?php
session_start();
require_once (__DIR__."/../MDB/BicicletaMDB.php");

$nombre = $_POST['bike'];
$bicicleta = buscarBicicletaSegunNombre($nombre);
$bike_serial = $bicicleta->getNumeroSerial();

    if($bike_serial){
        header("Location: ../../View/reportar_robo.php?name=$nombre&serial=$bike_serial");
    }else{
        header("Location: ../../View/garaje.php");
    }