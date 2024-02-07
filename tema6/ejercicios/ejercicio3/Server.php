<?php

$dolar = 1.12;
$libra = 0.84;

if ($_GET['origen'] != $_GET['destino']) {
    if ($_GET['origen'] == 'euro') {
        if ($_GET['destino'] == 'dolar') {
            $cantidad = $_GET['cantidad'] * $dolar;
        } else {
            $cantidad = $_GET['cantidad'] * $libra;
        }
    } elseif ($_GET['origen'] == 'dolar') {
        if ($_GET['destino'] == 'euro') {
            $cantidad = $_GET['cantidad'] / $dolar;
        } else {
            $cantidad = $_GET['cantidad'] / $dolar * $libra;
        }
    } else {
        if ($_GET['destino'] == 'euro') {
            $cantidad = $_GET['cantidad'] / $libra;
        } else {
            $cantidad = $_GET['cantidad'] / $libra * $dolar;
        }
    }
} else {
    $cantidad = $_GET['cantidad'];
}

$conversion['Cantidad'] = $cantidad;
$conversion['Origen'] = $_GET['origen'];
$conversion['Destino'] = $_GET['destino'];

echo json_encode($conversion);
