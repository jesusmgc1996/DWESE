<?php
require_once "Persona.php";

class Empleado extends Persona {
    protected $salario;

    public function __construct($nombre = 'Jesús', $apellidos = 'García', $edad = 27, $salario = 1000) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->salario = $salario;
    }

    public function __toString() {
        return parent::__toString() . ". Mi salario es " . $this->salario;
    }
}