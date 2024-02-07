<?php

$datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Málaga&units=metric&appid=b5ca3577856342213aad48267565ee92");
$tiempo = json_decode($datos);
echo "<br><br>Temperatura: " . $tiempo->main->temp;
