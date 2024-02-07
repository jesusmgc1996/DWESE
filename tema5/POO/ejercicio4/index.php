<?php
require_once "Zona.php";

$principal = new Zona("Zona principal", 1000, 1000);
$compra_venta = new Zona("Zona compra-venta", 200, 200);
$vip = new Zona("Zona VIP", 25, 25);

if (isset($_POST['comprar'])) {
    if ($_POST['zona'] == $principal->nombre_zona) {
        if ($_POST['entradas'] <= $principal->plazas_restantes) {
            $principal->vender($_POST['entradas']);
        } else {
            $error = true;
        }
    } elseif ($_POST['zona'] == $compra_venta->nombre_zona) {
        if ($_POST['entradas'] <= $compra_venta->plazas_restantes) {
            $compra_venta->vender($_POST['entradas']);
        } else {
            $error = true;
        }
    } else {
        if ($_POST['entradas'] <= $vip->plazas_restantes) {
            $vip->vender($_POST['entradas']);
        } else {
            $error = true;
        }
    }
}
?>

<h1>Expocoches Campanillas</h1>
Bienvenido a Expocoches Campanillas. ¿Cuántas entradas desea comprar?<br><br>
<form action="" method="post">
    Zona: <select name="zona">
        <option value="Zona principal">Principal</option>
        <option value="Zona compra-venta">Compra-Venta</option>
        <option value="Zona VIP">VIP</option>
    </select>
    Número de entradas: <input type="number" name="entradas">
    <input type="submit" name="comprar" value="Comprar">
</form>
<?php
if (isset($error)) {
    echo "<span style='color: red'>El número de entradas es incorrecto.</span><br><br>";
}
echo "$principal->nombre_zona: $principal->plazas_restantes de $principal->plazas_totales entradas.<br><br>";
echo "$compra_venta->nombre_zona: $compra_venta->plazas_restantes de $compra_venta->plazas_totales entradas.<br><br>";
echo "$vip->nombre_zona: $vip->plazas_restantes de $vip->plazas_totales entradas.<br><br>";
