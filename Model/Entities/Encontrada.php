<?php

class Encontrada{
    private $id;
    private $e_serial;
    private $marca;
    private $modelo;
    private $color1;
    private $color2;
    private $codigo;
    private $tipo;
    private $fecha;
    private $lugar;
    private $info_lugar;
    private $foto;
    private $detalles;
    private $email;



    public function __construct($id,$e_serial,$marca,$modelo,$color1,$color2,$codigo,$tipo,
        $fecha,$lugar, $info_lugar, $foto,$detalles,$email){
        $this->id = $id;
        $this->e_serial = $e_serial;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color1 = $color1;
        $this->color2 = $color2;
        $this->codigo = $codigo;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->lugar = $lugar;
        $this->info_lugar = $info_lugar;
        $this->foto = $foto;
        $this->detalles = $detalles;
        $this->email = $email;
    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getE_Serial(){
        return $this->e_serial;
    }

    public function setE_Serial($e_serial){
        $this->e_serial = $e_serial;
        return $this;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }

    public function getLugar(){
        return $this->lugar;
    }

    public function setLugar($lugar){
        $this->lugar = $lugar;
        return $this;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
        return $this;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
        return $this;
    }

    public function getColor1(){
        return $this->color1;
    }

    public function setColor1($color1){
        $this->color1 = $color1;
        return $this;
    }

    public function getColor2(){
        return $this->color2;
    }

    public function setColor2($color2){
        $this->color2 = $color2;
        return $this;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
        return $this;
    }

     public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }

     public function getInfoLugar(){
        return $this->info_lugar;
    }

    public function setInfoLugar($info_lugar){
        $this->info_lugar = $info_lugar;
        return $this;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }

    public function getDetalles(){
        return $this->detalles;
    }

    public function setDetalles($detalles){
        $this->detalles = $detalles;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
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

