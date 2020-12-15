<?php

require_once ("DataSource.php");
require_once (__DIR__ . "/../Entities/Perdida.php");

class PerdidaDAO {

    public function buscarPerdidaSegunSerial($nserial){
        $data_source = new DataSource();
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM perdidas WHERE nserial = :nserial", array(':nserial'=>$nserial));
        $perdida=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $perdida = new Perdida(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nserial"],
                    $data_table[$indice]["fecha"],
                    $data_table[$indice]["hora"],
                    $data_table[$indice]["lugar"],
                    $data_table[$indice]["info_lugar"],
                    $data_table[$indice]["detalles"],
                    $data_table[$indice]["recompensa"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["email"],
                    $data_table[$indice]["telefono"],
                );
            }
            return $perdida;
        }else{
            return null;
        }
    }

    public function leerPerdidas(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT id,nserial,fecha,hora,lugar,info_lugar,detalles, recompensa,nombre,email,telefono FROM perdidas");
        $perdida=null;
        $perdidas=array();
        foreach($data_table as $indice=>$valor){
            $perdida = new Perdida(
                $data_table[$indice]["id"],
                $data_table[$indice]["nserial"],
                $data_table[$indice]["fecha"],
                $data_table[$indice]["hora"],
                $data_table[$indice]["lugar"],
                $data_table[$indice]["info_lugar"],
                $data_table[$indice]["detalles"],
                $data_table[$indice]["recompensa"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["email"],
                $data_table[$indice]["telefono"],
            );
            array_push($perdidas,$perdida);
        }
        return $perdidas;
    }

    public function insertarPerdida(Perdida $perdida){
        $data_source= new DataSource();
        $sql = "INSERT INTO perdidas (nserial,fecha,hora,lugar,info_lugar,detalles,recompensa,nombre,email,telefono)
                    VALUES (:nserial,:fecha,:hora,:lugar,:info_lugar,:detalles,:recompensa,:nombre,:email,:telefono)";

        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':nserial'=>$perdida->getSerial(),
                ':fecha'=>$perdida->getFecha(),
                ':hora'=>$perdida->getHora(),
                ':lugar'=>$perdida->getLugar(),
                ':info_lugar'=>$perdida->getInfoLugar(),
                ':detalles'=>$perdida->getDetalles(),
                ':recompensa'=>$perdida->getRecompensa(),
                ':nombre'=>$perdida->getNombre(),
                ':email'=>$perdida->getEmail(),
                ':telefono'=>$perdida->getTelefono(),
            )
        );

        return $resultado;
    }


    public function modificarPerdida(Perdida $perdida, $id){
        $data_source= new DataSource();
        $sql = "UPDATE perdidas SET id=:id,nserial=:nserial,fecha=:fecha,hora=:hora,lugar=:lugar,info_lugar=:info_lugar,detalles=:detalles, recompensa=:recompensa,nombre=:nombre,email=:email,telefono=:telefono WHERE id = :id";

        $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':id'=>$perdida->getId(),
                ':nserial'=>$perdida->getSerial(),
                ':fecha'=>$perdida->getFecha(),
                ':hora'=>$perdida->getHora(),
                ':lugar'=>$perdida->getLugar(),
                ':info_lugar'=>$perdida->getInfoLugar(),
                ':detalles'=>$perdida->getDetalles(),
                ':recompensa'=>$perdida->getRecompensa(),
                ':nombre'=>$perdida->getNombre(),
                ':email'=>$perdida->getEmail(),
                ':telefono'=>$perdida->getTelefono(),
            )
        );

        return $resultado;
    }

    public function borrarPerdida($id){
        $data_source = new DataSource();
        $resultado= $data_source->ejecutarActualizacion("DELETE FROM perdidas WHERE id = :id", array('id'=>$id));

        return $resultado;
    }


}
