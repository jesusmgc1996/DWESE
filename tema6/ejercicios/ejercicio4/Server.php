<?php

$palos = array('Oros', 'Copas', 'Espadas', 'Bastos');
$figuras = array('As', '2', '3', '4', '5', '6', '7', '10', '11', '12');
$mazo = array();

while (count($mazo) < $_GET['num']) {
    $palo = $palos[array_rand($palos)];
    $figura = $figuras[array_rand($figuras)];
    $carta = "$figura de $palo";

    if (!in_array($carta, $mazo)) {
        $mazo[] = $carta;
    }
}
echo json_encode($mazo);
