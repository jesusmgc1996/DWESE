<?php
require_once "Animal.php";

class Ave extends Animal {
    public function volar() {
        echo "$this->nombre está volando<br>";
    }
}