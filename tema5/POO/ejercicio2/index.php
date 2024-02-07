<?php
require_once "Bicicleta.php";
require_once "Coche.php";

$bicicleta = new Bicicleta();
$bicicleta->andar(10);
$bicicleta->hacerCaballito();
echo "Kilometraje de la bicicleta: " . $bicicleta->getKmRecorridos() . " km<br>";

$coche = new Coche();
$coche->andar(50);
$coche->quemarRueda();
echo "Kilometraje del coche: " . $coche->getKmRecorridos() . " km<br>";

echo "Kilometraje total: " . Vehiculo::getKmTotales() . " km<br>";
echo "Vehículos creados: " . Vehiculo::getVehiculosCreados() . "<br>";