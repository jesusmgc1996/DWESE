<?php
require_once "Mamifero.php";

class Perro extends Mamifero {
    public function ladrar() {
        echo "$this->nombre está ladrando<br>";
    }
}