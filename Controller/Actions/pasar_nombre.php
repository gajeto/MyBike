<?php
session_start();
require_once (__DIR__."/../MDB/BicicletaMDB.php");

$bike = $_POST['bike'];

    if($bike){
        header("Location: ../../View/reportar.php?name=$bike");
    }else{
        header("Location: ../../View/garaje.php");
    }