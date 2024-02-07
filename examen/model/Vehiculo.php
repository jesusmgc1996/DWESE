<?php

class Vehiculo {
    private $matricula;
    private $marca;
    private $modelo;
    private $color;
    private $plazas;
    private $fecha;

    public function __construct($matricula = "", $marca = "", $modelo = "", $color = "", $plazas = "", $fecha = "") {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->plazas = $plazas;
        $this->fecha = $fecha;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}