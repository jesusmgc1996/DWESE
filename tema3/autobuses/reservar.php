<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    try {
        $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql: host=localhost; dbname=autobuses; charset=utf8mb4', 'dwes', 'abc123.', $opt);
        $result1 = $conex->query("SELECT DISTINCT Origen FROM viajes");
        $result2 = $conex->query("SELECT DISTINCT Destino FROM viajes");
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
    ?>
    <h1>Reservar viaje</h1>
    <form action="" method="POST">
        Fecha: <input type="date" name="fecha"><br>
        Origen: <select name="origen">
            <?php
            while ($reg = $result1->fetchObject()) {
                echo "<option value='$reg->Origen'>$reg->Origen</option>";
            }
            ?>
        </select> <br>
        Destino: <select name="destino">
            <?php
            while ($reg = $result2->fetchObject()) {
                echo "<option value='$reg->Destino'>$reg->Destino</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" name="consultar" value="Consultar">
    </form>
    <?php
    if (isset($_POST['consultar'])) {
        $result = $conex->query("SELECT * FROM viajes WHERE Fecha = '$_POST[fecha]' AND Origen = '$_POST[origen]' AND Destino = '$_POST[destino]'");
        if ($result->rowCount()) {
            $reg = $result->fetchObject();
            echo "<br><form action='' method='POST'>";
            echo "Fecha: <input type='date' name='fecha' readonly value='$reg->Fecha'><br>";
            echo "Origen: <input type='text' name='origen' readonly value='$reg->Origen'><br>";
            echo "Destino: <input type='text' name='destino' readonly value='$reg->Destino'><br>";
            echo "Origen: <input type='text' name='origen' readonly value='$reg->Origen'><br>";
            echo "Plazas libres: <input type='text' name='plazas_libres' readonly value='$reg->Plazas_libres'><br>";
            echo "Plazas a reservar: <input type='text' name='plazas_reservar'><br><br>";
            echo "<input type='submit' name='reservar' value='Reservar'>";
            echo "</form>";
        } else {
            echo "<br>No hay viajes disponibles<br>";
        }
    }
    if (isset($_POST['reservar'])) {
        if ($_POST['plazas_libres'] > $_POST['plazas_reservar']) {
            try {
                $conex->exec("UPDATE viajes SET Plazas_libres = Plazas_libres - $_POST[plazas_reservar] WHERE Origen = '$_POST[origen]' AND Destino = '$_POST[destino]' AND Fecha = '$_POST[fecha]'");
                echo "<br>La reserva se ha realizado correctamente<br>";
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        } else {
            echo "<br>Las plazas reservadas no pueden ser mayores que las plazas libres<br>";
        }
    }
    ?>
    <br><a href='index.php'>Volver</a>
</body>

</html>