<?php

$datos = file_get_contents("http://localhost/DWESE/tema6/REST/Server.php");
$productos = json_decode($datos);
foreach ($productos as $fila) {
    foreach ($fila as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
    echo "<br>";
}