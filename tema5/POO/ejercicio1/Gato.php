<?php
require_once "Mamifero.php";

class Gato extends Mamifero {
    public function maullar() {
        echo "$this->nombre está maullando<br>";
    }
}