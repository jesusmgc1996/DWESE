<?php
require_once "Vehiculo.php";

class Bicicleta extends Vehiculo {
    public function hacerCaballito() {
        echo "Haciendo el caballito con la bicicleta<br>";
    }
}