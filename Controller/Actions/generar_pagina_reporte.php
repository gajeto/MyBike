<?php
session_start();
require_once (__DIR__."/../MDB/BicicletaMDB.php");
require_once (__DIR__."/../MDB/PerdidaMDB.php");

//$serial = $_POST['numero_serial'];
$serial = "AX12345";

    if($serial){
        header("Location: ../../View/pagina_reporte.php?serial=$serial");
    }else{
        header("Location: ../../View/garaje.php");
    }