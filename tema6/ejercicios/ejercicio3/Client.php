<?php
if (isset($_POST['convertir'])) {
    $conversion = file_get_contents("http://localhost/DWESE/tema6/ejercicio3/Server.php?cantidad=" . $_POST['cantidad'] . "&origen=" . $_POST['origen'] . "&destino=" . $_POST['destino']);
    $datos = json_decode($conversion);
    foreach ($datos as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
    echo "<br>";
}
?>

<form action="" method="post">
    Cantidad: <input type="number" name="cantidad"><br>
    Moneda origen: <select name="origen">
        <option value="euro">Euro</option>
        <option value="dolar">Dólar</option>
        <option value="libra">Libra</option>
    </select><br>
    Moneda destino: <select name="destino">
        <option value="euro">Euro</option>
        <option value="dolar">Dólar</option>
        <option value="libra">Libra</option>
    </select><br><br>
    <input type="submit" name="convertir" value="Convertir">
</form>