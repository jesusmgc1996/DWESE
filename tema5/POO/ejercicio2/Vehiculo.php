<?php

class Vehiculo {
    private static $vehiculosCreados = 0;
    private static $kmTotales = 0;
    
    protected $kmRecorridos = 0;

    public function __construct() {
        self::$vehiculosCreados++;
    }

    public static function getVehiculosCreados() {
        return self::$vehiculosCreados;
    }

    public static function getKmTotales() {
        return self::$kmTotales;
    }

    public function getKmRecorridos() {
        return $this->kmRecorridos;
    }

    public function andar($km) {
        $this->kmRecorridos += $km;
        self::$kmTotales += $km;
        echo "El vehículo ha recorrido $km km";
    }
}