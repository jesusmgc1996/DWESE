<?php
require_once "Ave.php";

class Canario extends Ave {
    public function cantar() {
        echo "$this->nombre está cantando<br>";
    }
}