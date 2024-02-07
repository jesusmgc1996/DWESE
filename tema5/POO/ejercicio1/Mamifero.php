<?php
require_once "Animal.php";

class Mamifero extends Animal {
    public function amamantar() {
        echo "$this->nombre está amamantando a sus crías<br>";
    }
}