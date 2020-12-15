<?php

function buscarBicicletaSegunMarca($marca){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunMarca($marca);
    return $bicicleta;
}

function buscarBicicletaSegunModelo($modelo){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunModelo($modelo);
    return $bicicleta;
}

function buscarBicicletaSegunTipo($tipo){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunTipo($tipo);
    return $bicicleta;
}

function buscarBicicletaSegunColor($color){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunColor($color);
    return $bicicleta;
}

function buscarBicicletaSegunNombre($nombre){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunNombre($nombre);
    return $bicicleta;
}

function buscarBicicletaSegunSerial($numero_serial){
    require_once(__DIR__."/../../Model/DAO/BicicletaDAO.php");
    $dao=new BicicletaDAO();
    $bicicleta = $dao->buscarBicicletaSegunSerial($numero_serial);
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