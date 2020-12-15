<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../Entities/Bicicleta.php");

class BicicletaDAO {

    public function buscarBicicletaSegunNombre($nombre){
        $data_source = new DataSource();
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM bicicletas WHERE nombre = :nombre", array(':nombre'=>$nombre));
        $bicicleta=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $bicicleta = new Bicicleta(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["estado"],
                    $data_table[$indice]["numero_serial"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["marca"],
                    $data_table[$indice]["modelo"],
                    $data_table[$indice]["color1"],
                    $data_table[$indice]["color2"],
                    $data_table[$indice]["tipo"],
                    $data_table[$indice]["valor"],
                    $data_table[$indice]["extra_info"],
                );
            }
            return $bicicleta;
        }else{
            return null;
        }
    }

    public function leerBicicletas(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT id,estado,numero_serial,nombre,marca,modelo,color1, color2,tipo,valor,extra_info FROM bicicletas");
        $bicicleta=null;
        $bicicletas=array();
        foreach($data_table as $indice=>$valor){
            $bicicleta = new Bicicleta(
                $data_table[$indice]["id"],
                $data_table[$indice]["estado"],
                $data_table[$indice]["numero_serial"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["marca"],
                $data_table[$indice]["modelo"],
                $data_table[$indice]["color1"],
                $data_table[$indice]["color2"],
                $data_table[$indice]["tipo"],
                $data_table[$indice]["valor"],
                $data_table[$indice]["extra_info"],
            );
            array_push($bicicletas,$bicicleta);
        }
        return $bicicletas;
    }

    public function insertarBicicleta(Bicicleta $bicicleta){
        $data_source= new DataSource();
        $sql = "INSERT INTO bicicletas (estado, numero_serial, nombre, marca, modelo, color1, color2, tipo, valor, extra_info) VALUES (:estado, :numero_serial, :nombre, :marca, :modelo, :color1, :color2, :tipo, :valor, :extra_info)";

        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':estado'=>$bicicleta->getEstado(),
                ':numero_serial'=>$bicicleta->getNumeroSerial(),
                ':nombre'=>$bicicleta->getNombre(),
                ':marca'=>$bicicleta->getMarca(),
                ':modelo'=>$bicicleta->getModelo(),
                ':color1'=>$bicicleta->getColor1(),
                ':color2'=>$bicicleta->getColor2(),
                ':tipo'=>$bicicleta->getTipo(),
                ':valor'=>$bicicleta->getValor(),
                ':extra_info'=>$bicicleta->getExtraInfo(),
            )
        );

        return $resultado;
    }


    public function modificarbicicleta(Bicicleta $bicicleta, $id){
        $data_source= new DataSource();
        $sql = "UPDATE bicicletas SET estado=:estado, numero_serial=:numero_serial, nombre=:nombre, 
        marca=:marca, modelo=:modelo, color1=:color1, color2=:color2, tipo=:tipo, valor=:valor, 
        extra_info=:extra_info WHERE id = :id";

        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':id'=>$bicicleta->getId(),
                ':estado'=>$bicicleta->getEstado(),
                ':numero_serial'=>$bicicleta->getNumeroSerial(),
                ':nombre'=>$bicicleta->getNombre(),
                ':marca'=>$bicicleta->getMarca(),
                ':modelo'=>$bicicleta->getModelo(),
                ':color1'=>$bicicleta->getColor1(),
                ':color2'=>$bicicleta->getColor2(),
                ':tipo'=>$bicicleta->getTipo(),
                ':valor'=>$bicicleta->getValor(),
                ':extra_info'=>$bicicleta->getExtraInfo(),
            )
        );

        return $resultado;
    }

    public function borrarBicicleta($id){
        $data_source = new DataSource();
        $resultado= $data_source->ejecutarActualizacion("DELETE FROM bicicletas WHERE id = :id", array('id'=>$id));

        return $resultado;
    }


}
