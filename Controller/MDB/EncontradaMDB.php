<?php

function buscarEncontradaSegunNombre($nombre){
    require_once(__DIR__."/../../Model/DAO/EncontradaDAO.php");
    $dao=new EncontradaDAO();
    $encontrada = $dao->buscarEncontradaSegunNombre($nombre);
    return $encontrada;
}

function insertarEncontrada($Encontrada){
    require_once(__DIR__."/../../Model/DAO/EncontradaDAO.php");
    $dao=new EncontradaDAO();
    $resultado=$dao->insertarEncontrada($Encontrada);
    return $resultado;
}

function modificarEncontrada($Encontrada,$e_serial){
    require_once(__DIR__."/../../Model/DAO/EncontradaDAO.php");
    $dao=new EncontradaDAO();
    $resultado=$dao->modificarEncontrada($Encontrada,$e_serial);
    return $resultado;
}

function borrarEncontrada($id){
    require_once(__DIR__."/../../Model/DAO/EncontradaDAO.php");
    $dao=new EncontradaDAO();
    $resultado=$dao->borrarEncontrada($id);
    return $resultado;
}

function leerEncontradas(){
    require_once(__DIR__."/../../Model/DAO/EncontradaDAO.php");
    $dao=new EncontradaDAO();
    $resultado = array();
    $resultado=$dao->leerEncontradas();
    return $resultado;
}