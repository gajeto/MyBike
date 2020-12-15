<?php
        session_start();
        require_once (__DIR__."/../MDB/PerdidaMDB.php");
        $home = "..";
        $errMsg = 'OK';
        $perdidas = leerPerdidas();
        
        if($perdidas){
            foreach ($perdidas as $i => $perdida) {
                $_SESSION['p'.$i]['SERIAL'] = $perdida->getSerial();
                $_SESSION['p'.$i]['FECHA'] = $perdida->getFecha();
                $_SESSION['p'.$i]['HORA']= $perdida->getHora();
                $_SESSION['p'.$i]['NOMBRE']= $perdida->getNombre();
            }     
            header("Location: ../../View/bicicletas_recuperadas.php");
        }else{
            $errMsg .= 'No hay usuarios para mostrar';
            header("Location: ../../View/login.php");    
        }

?>