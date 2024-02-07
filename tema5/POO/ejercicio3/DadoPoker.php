<?php
class DadoPoker {
    protected static $tiradas = 0;

    public function __construct() {
        self::$tiradas++;
    }

    public function tira() {
        return rand(0, 5);
    }

    public function nombreFigura($value) {
        if ($value == 0) {
            return "La figura es: A<br>";
        } elseif ($value == 1) {
            return "La figura es: K<br>";
        } elseif ($value == 2) {
            return "La figura es: Q<br>";
        } elseif ($value == 3) {
            return "La figura es: J<br>";
        } elseif ($value == 4) {
            return "La figura es: 8<br>";
        } else {
            return "La figura es: 7<br>";
        }
    }

    public static function getTiradasTotales() {
        return self::$tiradas;
    }
}