<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>Borrar</h2>
    <?php
    $dni = true;
    if (isset($_POST['buscar']) && empty($_POST['dni'])) {
        $dni = false;
    }
    ?>
    <form action="" method="POST">
        DNI: <input type="text" name="dni">
        <?php if (!$dni) echo '<span style=color:red>El DNI no puede estar vacío</span>' ?><br><br>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <?php
    if (isset($_POST['buscar']) && $dni) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            $conex->set_charset('utf8mb4');
            $result = $conex->query("SELECT * FROM jugadores WHERE DNI = '$_POST[dni]'");   
            if ($result->num_rows > 0) {
                $reg = $result->fetch_object();
                echo "<br><table border='1'>";
                echo "<tr>";
                echo "<td>Nombre</td>";
                echo "<td>DNI</td>";
                echo "<td>Dorsal</td>";
                echo "<td>Posición</td>";
                echo "<td>Equipo</td>";
                echo "<td>Goles</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>$reg->Nombre</td>";
                echo "<td>$reg->DNI</td>";
                echo "<td>$reg->Dorsal</td>";
                echo "<td>$reg->Posicion</td>";
                echo "<td>$reg->Equipo</td>";
                echo "<td>$reg->Goles</td>";
                echo "</tr>";
                echo "</table>";
                ?>
                <br><form action="" method="POST">
                    <input type="submit" name="borrar" value="Borrar">
                    <input type="hidden" name="dni" value="<?php echo "$reg->DNI" ?>">
                </form>
                <?php
            } else {
                echo "<br>No se han encontrado datos con el DNI introducido<br>";
            }
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $conex->close();
    }
    if (isset($_POST['borrar'])) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            $conex->set_charset('utf8mb4');
            $conex->query("DELETE FROM jugadores WHERE DNI = '$_POST[dni]'");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        echo "<br>Registro borrado correctamente<br>";
        echo "<br><a href='index.php'>Volver</a>";
        $conex->$PDO::close();
    }
    ?>
</body>

</html>