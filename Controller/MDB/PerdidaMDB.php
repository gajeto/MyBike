<?php

function buscarPerdidaSegunFiltro($filtro){
    require_once(__DIR__."/../../Model/DAO/PerdidaDAO.php");
    $dao=new PerdidaDAO();
    $perdida = $dao->buscarPerdidaSegunFiltro($filtro);
    return $perdida;
}

function insertarPerdida($Perdida){
    require_once(__DIR__."/../../Model/DAO/PerdidaDAO.php");
    $dao=new PerdidaDAO();
    $resultado=$dao->insertarPerdida($Perdida);
    return $resultado;
}

function modificarPerdida($Perdida,$id){
    require_once(__DIR__."/../../Model/DAO/PerdidaDAO.php");
    $dao=new PerdidaDAO();
    $resultado=$dao->modificarPerdida($Perdida,$id);
    return $resultado;
}

function borrarPerdida($id){
    require_once(__DIR__."/../../Model/DAO/PerdidaDAO.php");
    $dao=new PerdidaDAO();
    $resultado=$dao->borrarPerdida($id);
    return $resultado;
}

function leerPerdidas(){
    require_once(__DIR__."/../../Model/DAO/PerdidaDAO.php");
    $dao=new PerdidaDAO();
    $resultado = array();
    $resultado=$dao->leerPerdidas();
    return $resultado;
}