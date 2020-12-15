<?php
    session_start();
    require_once (__DIR__."/../MDB/BicicletaMDB.php");
    require_once (__DIR__."/../MDB/PerdidaMDB.php");
    
    $home = "..";

    /*$serial= $_POST['serial'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];

    if ($serial) {
        $bike = buscarBicicletaSegunSerial($serial);
    }elseif ($marca) {
        $bike = buscarBicicletaSegunMarca($marca);
    }elseif ($modelo) {
        $bike = buscarBicicletaSegunModelo($modelo);
    }elseif ($color) {
        $bike = buscarBicicletaSegunColor($color);
    }elseif($tipo){
        $bike = buscarBicicletaSegunTipo($tipo);    
    }else{
         $errMsg .= 'No hay usuarios para mostrar';
    }*/

    //$perdidas = buscarPerdidaSegunSerial($bike->getNumeroSerial());
    $perdidas = leerPerdidas();

    if($perdidas){
        foreach ($perdidas as $i => $perdida) {
            $_SESSION['p'.$i]['SERIAL'] = $perdida->getSerial();
            $_SESSION['p'.$i]['FECHA'] = $perdida->getFecha();
            $_SESSION['p'.$i]['HORA']= $perdida->getHora();
            $_SESSION['p'.$i]['NOMBRE']= $perdida->getNombre();
        }     
        header("Location: ../../View/buscar_bicicletas.php");
    }else{
        
        header("Location: ../../View/login.php");    
    }

?>