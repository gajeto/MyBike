<?php
        session_start();
        require_once (__DIR__."/../MDB/EncontradaMDB.php");
        $home = "..";
        $errMsg = 'OK';
        $encontradas = leerEncontradas();
        
        if($encontradas){
            foreach ($encontradas as $i => $encontrada) {
                $_SESSION['e'.$i]['SERIAL'] = $encontrada->getE_Serial();
                $_SESSION['e'.$i]['FECHA'] = $encontrada->getFecha();
                $_SESSION['e'.$i]['MARCA']= $encontrada->getMarca();
                $_SESSION['e'.$i]['MODELO'] = $encontrada->getModelo();
                $_SESSION['e'.$i]['COLOR'] = $encontrada->getColor1();
                $_SESSION['e'.$i]['TIPO'] = $encontrada->getTipo();
            }    
            header("Location: ../../View/bicicletas_encontradas.php");
        }else{
            $errMsg .= 'No hay usuarios para mostrar';
            header("Location: ../../View/login.php");    
        }

?>