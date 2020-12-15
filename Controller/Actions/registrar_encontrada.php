<?php
session_start();
require_once (__DIR__."/../MDB/EncontradaMDB.php");
require_once (__DIR__."/../../Model/Entities/Encontrada.php");
$home = "..";


$statusMsg = 'OK';

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
$detalles = $_POST['detalles'];
$email = $_POST['email'];

//CARGAR FOTO
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $foto = $fileName; 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

//
$bike = new Encontrada($id,$e_serial,$marca,$modelo,$color1,$color2,$codigo,$tipo,$fecha,$lugar,$info_lugar,$foto,
						$detalles,$email);
$operacion = insertarEncontrada($bike);

if($operacion != NULL){
    header("Location: ../../View/bicicletas_encontradas.php"); // ENVIAR AL HOMEPAGES DEL USUARIO
}else{
    header("Location: ../../View/index.php"); //ENVIAR AL LOGIN NUEVAMENTE
}

