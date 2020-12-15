<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../Entities/Encontrada.php");

class EncontradaDAO {

    public function buscarEncontradaSegunNombre($nombre){
        $data_source = new DataSource();
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM encontradas WHERE nombre = :nombre", array(':nombre'=>$nombre));
        $encontrada=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $encontrada = new Encontrada(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["e_serial"],
                    $data_table[$indice]["marca"],
                    $data_table[$indice]["modelo"],
                    $data_table[$indice]["color1"],
                    $data_table[$indice]["color2"],
                    $data_table[$indice]["codigo"],
                    $data_table[$indice]["tipo"],
                    $data_table[$indice]["fecha"],
                    $data_table[$indice]["lugar"],
                    $data_table[$indice]["info_lugar"],
                    $data_table[$indice]["foto"],
                    $data_table[$indice]["detalles"],
                    $data_table[$indice]["email"],
                );
            }
            return $encontrada;
        }else{
            return null;
        }
    }

    public function leerEncontradas(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT id,e_serial,marca,modelo,color1,color2,codigo,tipo,fecha,lugar,info_lugar,foto,detalles,email FROM encontradas");
        $encontrada=null;
        $encontradas=array();
        foreach($data_table as $indice=>$valor){
            $encontrada = new Encontrada(
                $data_table[$indice]["id"],
                $data_table[$indice]["e_serial"],
                $data_table[$indice]["marca"],
                $data_table[$indice]["modelo"],
                $data_table[$indice]["color1"],
                $data_table[$indice]["color2"],
                $data_table[$indice]["codigo"],
                $data_table[$indice]["tipo"],
                $data_table[$indice]["fecha"],
                $data_table[$indice]["lugar"],
                $data_table[$indice]["info_lugar"],
                $data_table[$indice]["foto"],
                $data_table[$indice]["detalles"],
                $data_table[$indice]["email"],
            );
            array_push($encontradas,$encontrada);
        }
        return $encontradas;
    }

    public function insertarEncontrada(Encontrada $encontrada){
        $data_source= new DataSource();
        $sql = "INSERT INTO encontradas (e_serial,marca,modelo,color1,color2,codigo,tipo,
        fecha,lugar,info_lugar,foto,detalles,email) VALUES (:e_serial, :marca, :modelo, :color1, :color2, :codigo, :tipo, :fecha, :lugar, :info_lugar, :foto, :detalles, :email)";

        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':e_serial'=>$encontrada->getE_Serial(),
                ':marca'=>$encontrada->getMarca(),
                ':modelo'=>$encontrada->getModelo(),
                ':color1'=>$encontrada->getColor1(),
                ':color2'=>$encontrada->getColor2(),
                ':codigo'=>$encontrada->getCodigo(),
                ':tipo'=>$encontrada->getTipo(),
                ':fecha'=>$encontrada->getFecha(),
                ':lugar'=>$encontrada->getLugar(),
                ':info_lugar'=>$encontrada->getInfoLugar(),
                ':foto'=>$encontrada->getFoto(),
                ':detalles'=>$encontrada->getDetalles(),
                ':email'=>$encontrada->getEmail(),
            )
        );

        return $resultado;
    }


    public function modificarEncontrada(Encontrada $Encontrada, $e_serial){
        $data_source= new DataSource();
        $sql = "UPDATE encontradas SET estado=:estado, numero_serial=:numero_serial, nombre=:nombre, 
        marca=:marca, modelo=:modelo, color1=:color1, color2=:color2, tipo=:tipo, valor=:valor, 
        extra_info=:extra_info WHERE e_serial = :e_serial";

        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':e_serial'=>$encontrada->getE_Serial(),
                ':marca'=>$encontrada->getMarca(),
                ':modelo'=>$encontrada->getModelo(),
                ':color1'=>$encontrada->getColor1(),
                ':color2'=>$encontrada->getColor2(),
                ':codigo'=>$encontrada->getCodigo(),
                ':tipo'=>$encontrada->getTipo(),
                ':fecha'=>$encontrada->getFecha(),
                ':lugar'=>$encontrada->getLugar(),
                ':info_lugar'=>$encontrada->getInfoLugar(),
                ':foto'=>$encontrada->getFoto(),
                ':detalles'=>$encontrada->getDetalles(),
                ':email'=>$encontrada->getEmail(),
            )
        );

        return $resultado;
    }

    public function borrarEncontrada($id){
        $data_source = new DataSource();
        $resultado= $data_source->ejecutarActualizacion("DELETE FROM encontradas WHERE id = :id", array('id'=>$id));

        return $resultado;
    }


}
