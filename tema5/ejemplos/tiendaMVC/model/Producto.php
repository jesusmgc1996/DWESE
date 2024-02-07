<?php

class Producto {
    private $cod;
    private $nombre;
    private $precio;

    public function __construct($cod = 0, $nombre = "", $precio = 0) {
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function modificarProducto($cod, $nombre, $precio) {
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "Código: $this->cod - Nombre: $this->nombre - Precio: $this->precio<br>";
    }
}