<?php
    session_start();
    require_once (__DIR__."/../MDB/BicicletaMDB.php");
    require_once (__DIR__."/../MDB/PerdidaMDB.php");

    //$serial = $_POST['n_serial'];
    $serial = "AX12345";

    $bicicleta = buscarBicicletaSegunSerial($serial);
    $perdida = buscarPerdidaSegunSerial($serial);
    
    if($perdida){
            $fecha = $perdida->getFecha();
            $lugar = $perdida->getLugar();
            $infol = $perdida->getInfoLugar();
            $detalles = $perdida->getDetalles();
            $reward = $perdida->getRecompensa();
            $marca = $bicicleta->getMarca();
            $modelo = $bicicleta->getModelo();
            $color = $bicicleta->getColor1();
            $tipo = $bicicleta->getTipo();         
             
            $reporte = array('serial'=>$serial,'fecha'=>$fecha,'lugar'=>$lugar,'infol'=>$infol,'detalles'=>$detalles,'reward'=>$reward,'marca'=>$marca,'modelo'=>$modelo,'color'=>$color,'tipo'=>$tipo);

            $_SESSION['REPORTE'] = $reporte;
            header("Location: ../../View/pagina_reporte.php?serial=$serial");
    }else{
        header("Location: ../../View/login.php");    
    }

