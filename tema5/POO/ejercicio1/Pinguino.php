<?php
require_once "Ave.php";

class Pinguino extends Ave {
    public function nadar() {
        echo "$this->nombre está nadando<br>";
    }
}