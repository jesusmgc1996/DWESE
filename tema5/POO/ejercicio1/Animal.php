<?php

class Animal {
    protected $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function comer() {
        echo "$this->nombre está comiendo<br>";
    }

    public function dormir() {
        echo "$this->nombre está durmiendo<br>";
    }

    public function comunicar() {
        echo "$this->nombre se está comunicando<br>";
    }
}