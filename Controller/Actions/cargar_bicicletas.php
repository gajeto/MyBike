<?php
        session_start();
        require_once (__DIR__."/../MDB/BicicletaMDB.php");
        $home = "..";
        $errMsg = 'OK';
        $bicicletas = leerBicicletas();
        
        if($bicicletas){
            foreach ($bicicletas as $i => $bicicleta) {
                $_SESSION['b'.$i]['ESTADO'] = $bicicleta->getEstado();
                $_SESSION['b'.$i]['SERIAL'] = $bicicleta->getNumeroSerial();
                $_SESSION['b'.$i]['NOMBRE'] = $bicicleta->getNombre();
                $_SESSION['b'.$i]['MARCA']= $bicicleta->getMarca();
                $_SESSION['b'.$i]['MODELO'] = $bicicleta->getModelo();
                $_SESSION['b'.$i]['COLOR'] = $bicicleta->getColor1();
                $_SESSION['b'.$i]['TIPO'] = $bicicleta->getTipo();
            }    
            header("Location: ../../View/garaje.php");
        }else{
            $errMsg .= 'No hay usuarios para mostrar';
            header("Location: ../../View/login.php");    
        }

?>