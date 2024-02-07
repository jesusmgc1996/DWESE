<?php
require_once "Vehiculo.php";

class Coche extends Vehiculo {
    public function quemarRueda() {
        echo "Quemando rueda con el coche<br>";
    }
}