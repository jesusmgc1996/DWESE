<?php
if (isset($_POST['generar'])) {
    if ($_POST['num'] < 1 || $_POST['num'] > 40) {
        echo "Error: El número de cartas debe estar entre 1 y 40<br><br>";
    } else {
        $mazo = file_get_contents("http://localhost/DWESE/tema6/ejercicio4/Server.php?num=" . $_POST['num']);
        $cartas = json_decode($mazo);
        if (isset($cartas)) {
            foreach ($cartas as $value) {
                echo $value . "<br>";
            }
            echo "<br>";
        }
    }
}
?>

<form action="" method="post">
    Nº cartas: <input type="number" name="num">
    <input type="submit" name="generar" value="Generar">
</form>