<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>Datos</h2>
    <?php
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
        $result = $conex->query("SELECT * FROM jugadores");
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
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
            echo "La base de datos está vacía<br>";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    $conex->close();
    ?>
    <br><a href="index.php">Volver</a>
</body>

</html>