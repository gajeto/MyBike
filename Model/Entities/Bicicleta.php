<?php

class Bicicleta{
    private $id;
    private $estado;
    private $numero_serial;
    private $nombre;
    private $marca;
    private $modelo;
    private $color1;
    private $color2;
    private $tipo;
    private $valor;
    private $extra_info;


    public function __construct($id,$estado,$numero_serial, $nombre,$marca,$modelo,$color1,$color2,$tipo,$valor,
        $extra_info){
        $this->id = $id;
        $this->estado = $estado;
        $this->numero_serial = $numero_serial;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color1 = $color1;
        $this->color2 = $color2;
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->extra_info = $extra_info;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
        return $this;
    }

    public function getNumeroSerial(){
        return $this->numero_serial;
    }

    public function setNumeroSerial($numero_serial){
        $this->numero_serial = $numero_serial;
        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
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

     public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }

     public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
        return $this;
    }

     public function getExtraInfo(){
        return $this->extra_info;
    }

    public function setExtraInfo($extra_info){
        $this->extra_info = $extra_info;
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

