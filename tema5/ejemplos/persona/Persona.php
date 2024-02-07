<?php
class Persona {
    protected $nombre;
    protected $apellidos;
    protected $edad;
    protected static $numPerson = 0;

    public function __construct($nombre = "Jesús", $apellidos = "García", $edad = 27) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        self::$numPerson++;
    }

    public function __destruct() {
        self::$numPerson--;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __clone() {
        self::$numPerson++;
        $this->edad = 0;
    }
    
    public function __toString() {
        return "Hola, me llamo $this->nombre $this->apellidos y tengo $this->edad años";
    }

    public function __call($method, $args) {
        if ($method == "modificar") {
            if (count($args) == 1) {
                $this->nombre = $args[0];
            } elseif (count($args) == 2) {
                $this->nombre = $args[0];
                $this->apellidos = $args[1];

            } elseif (count($args) == 3) {
                $this->nombre = $args[0];
                $this->apellidos = $args[1];
                $this->edad = $args[2];
            }
        }
    }

    public static function getNumPerson() {
        return self::$numPerson;
    }
}