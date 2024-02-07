<?php
if (isset($_POST['generar'])) {
    $conex = new PDO('mysql: host=localhost; dbname=usuariosapi; charset=utf8mb4', 'dwes', 'abc123.');
    $datos = file_get_contents("https://random-data-api.com/api/v2/users?size=" . $_POST['num'] . "&ix_xml=true");
    $usuarios = json_decode($datos);
    if ($_POST['num'] > 1) {
        foreach ($usuarios as $fila) {
            echo "Id: " . $fila->id . "<br>";
            echo "Nombre: " . $fila->first_name . "<br>";
            echo "Apellido: " . $fila->last_name . "<br>";
            echo "E-mail: " . $fila->email . "<br>";
            echo "Teléfono: " . $fila->phone_number . "<br>";
            echo "Fecha de nacimiento: " . $fila->date_of_birth . "<br>";
            echo "Ciudad: " . $fila->address->city . "<br>";
            echo "País: " . $fila->address->country . "<br>";
            echo "Tarjeta de crédito: " . $fila->credit_card->cc_number . "<br><br>";
            $conex->exec("INSERT INTO usuarios VALUES ($fila->id, '$fila->first_name', '$fila->last_name', '$fila->email', '$fila->phone_number', '$fila->date_of_birth', '" . $fila->address->city . "', '" . $fila->address->country . "', '" . $fila->credit_card->cc_number . "')");
        }
    } else {
        echo "Id: " . $usuarios->id . "<br>";
        echo "Nombre: " . $usuarios->first_name . "<br>";
        echo "Apellido: " . $usuarios->last_name . "<br>";
        echo "E-mail: " . $usuarios->email . "<br>";
        echo "Teléfono: " . $usuarios->phone_number . "<br>";
        echo "Fecha de nacimiento: " . $usuarios->date_of_birth . "<br>";
        echo "Ciudad: " . $usuarios->address->city . "<br>";
        echo "País: " . $usuarios->address->country . "<br>";
        echo "Tarjeta de crédito: " . $usuarios->credit_card->cc_number . "<br><br>";
        $conex->exec("INSERT INTO usuarios VALUES ($usuarios->id, '$usuarios->first_name', '$usuarios->last_name', '$usuarios->email', '$usuarios->phone_number', '$usuarios->date_of_birth', '" . $usuarios->address->city . "', '" . $usuarios->address->country . "', '" . $usuarios->credit_card->cc_number . "')");
    }
}
?>

<form action="" method="post">
    Nº usuarios: <input type="number" name="num">
    <input type="submit" name="generar" value="Generar">
</form>