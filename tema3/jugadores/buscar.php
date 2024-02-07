<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>Buscar</h2>
    <?php
    $valor = true;
    if (isset($_POST['enviar']) && empty($_POST['valor'])) {
        $valor = false;
    }
    ?>
    <form action="" method="POST">
        Buscar por: <select name="buscar">
            <option value='DNI'>DNI</option>
            <option value='Equipo'>Equipo</option>
            <option value='Posicion'>Posición</option>
        </select><br>
        Valor a buscar: <input type="text" name="valor">
        <?php if (!$valor) echo '<span style=color:red>El valor a buscar no puede estar vacío</span>' ?><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    if (isset($_POST['enviar']) && $valor) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            $conex->set_charset('utf8mb4');
            if ($_POST['buscar'] == "DNI") {
                $result = $conex->query("SELECT * FROM jugadores WHERE DNI = '$_POST[valor]'");
            } elseif ($_POST['buscar'] == "Equipo") {
                $result = $conex->query("SELECT * FROM jugadores WHERE Equipo = '$_POST[valor]'");
            } else {
                $result = $conex->query("SELECT * FROM jugadores WHERE Posicion = '$_POST[valor]'");
            }
            if ($result->num_rows > 0) {
                echo "<br><table border='1'>";
                echo "<tr>";
                echo "<td>Nombre</td>";
                echo "<td>DNI</td>";
                echo "<td>Dorsal</td>";
                echo "<td>Posición</td>";
                echo "<td>Equipo</td>";
                echo "<td>Goles</td>";
                echo "</tr>";
                while ($reg = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>$reg->Nombre</td>";
                    echo "<td>$reg->DNI</td>";
                    echo "<td>$reg->Dorsal</td>";
                    echo "<td>$reg->Posicion</td>";
                    echo "<td>$reg->Equipo</td>";
                    echo "<td>$reg->Goles</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<br>No se han encontrado registros con el dato introducido<br>";
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        echo "<br><a href='index.php'>Volver</a>";
        $conex->close();
    }
    ?>
</body>

</html>