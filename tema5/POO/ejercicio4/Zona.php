<?php
class Zona {
    protected $nombre_zona;
    protected $plazas_totales;
    protected $plazas_restantes;

    public function __construct($nombre_zona = "", $plazas_totales = "", $plazas_restantes = "") {
        $this->nombre_zona = $nombre_zona;
        $this->plazas_totales = $plazas_totales;
        $this->plazas_restantes = $plazas_restantes;
    }

    public function __get($name) {
        return $this->$name;
    }
    
    public function __toString() {
        return "Zona: $this->nombre_zona. Plazas totales:  $this->plazas_totales. Plazas restantes: $this->plazas_restantes";
    }

    public function vender($value) {
        $this->plazas_restantes -= $value;
    }
}