<?php
require_once "Animal.php";

class Lagarto extends Animal {
    public function reptar() {
        echo "$this->nombre está reptando<br>";
    }
}