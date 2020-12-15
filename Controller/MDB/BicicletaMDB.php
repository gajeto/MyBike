<?php

function buscarBicicletaSegunNombre($nombre){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunNombre($nombre);
    return $bicicleta;
}

function insertarBicicleta($Bicicleta){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $resultado=$dao->insertarBicicleta($Bicicleta);
    return $resultado;
}

function modificarBicicleta($Bicicleta,$id){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $resultado=$dao->modificarBicicleta($Bicicleta,$id);
    return $resultado;
}

function borrarBicicleta($id){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $resultado=$dao->borrarBicicleta($id);
    return $resultado;
}

function leerBicicletas(){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $resultado = array();
    $resultado=$dao->leerBicicletas();
    return $resultado;
}