<?php

class Perdida{
    private $id;
    private $serial;
    private $fecha;
    private $hora;
    private $lugar;
    private $info_lugar;
    private $detalles;
    private $recompensa;
    private $nombre;
    private $email;
    private $telefono;


    public function __construct($id,$serial,$fecha,$hora,$lugar,$info_lugar,$detalles,$recompensa,$nombre,$email,$telefono){
        $this->id = $id;
        $this->serial = $serial;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->lugar = $lugar;
        $this->info_lugar = $info_lugar;
        $this->detalles = $detalles;
        $this->recompensa = $recompensa;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
        return $this;
    }

    public function getSerial(){
        return $this->serial;
    }

    public function setSerial($serial){
        $this->serial = $serial;
        return $this;
    }

    public function getLugar(){
        return $this->lugar;
    }

    public function setLugar($lugar){
        $this->lugar = $lugar;
        return $this;
    }

    public function getInfoLugar(){
        return $this->info_lugar;
    }

    public function setInfoLugar($info_lugar){
        $this->info_lugar = $info_lugar;
        return $this;
    }

    public function getDetalles(){
        return $this->detalles;
    }

    public function setDetalles($detalles){
        $this->detalles = $detalles;
        return $this;
    }

    public function getRecompensa(){
        return $this->recompensa;
    }

    public function setRecompensa($recompensa){
        $this->recompensa = $recompensa;
        return $this;
    }

     public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

     public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

     public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }

    public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}

