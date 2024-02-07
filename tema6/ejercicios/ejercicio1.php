<?php
if (isset($_POST['ver'])) {
    $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $_POST['ciudad'] . "&units=metric&appid=b5ca3577856342213aad48267565ee92");
    $tiempo = json_decode($datos);
    echo "<img src='https://openweathermap.org/img/wn/" . $tiempo->weather[0]->icon . "@2x.png'>";
    echo "<br>Pronóstico: " . $tiempo->weather[0]->main;
    echo "<br>Temperatura: " . $tiempo->main->temp . " ºC";
    echo "<br>Humedad: " . $tiempo->main->humidity . " %";
    echo "<br>Sensación térmica: " . $tiempo->main->feels_like . " ºC";
    echo "<br>Presión: " . $tiempo->main->pressure . " hPa";
    echo "<br><br>";
}
?>

<form action="" method="post">
    Ciudad: <select name="ciudad">
        <option value="Málaga">Málaga</option>
        <option value="Sevilla">Sevilla</option>
        <option value="Madrid">Madrid</option>
        <option value="Londres">Londres</option>
    </select><br><br>
    <input type="submit" name="ver" value="Ver tiempo">
</form>