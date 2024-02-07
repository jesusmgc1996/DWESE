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
        if (isset($_POST['borrar'])) {
            try {
                $conex->exec("DELETE FROM viajes WHERE Fecha = '$_POST[Fecha]' AND Matricula = '$_POST[Matricula]' AND Origen = '$_POST[Origen]' AND Destino = '$_POST[Destino]'");
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
            $borrado = true;
        }
        if (isset($_POST['modificar'])) {
            try {
                $result = $conex->query("SELECT * FROM autos WHERE Matricula = '$_POST[matricula]'");
                $reg = $result->fetchObject();
                if ($_POST['plazas'] > $reg->Num_plazas) {
                    $modificado = "<br>Las plazas libres no pueden ser superiores a las plazas del autobús<br>";
                } else {
                    $conex->exec("UPDATE viajes SET Fecha = '$_POST[fecha]', Matricula = '$_POST[matricula]', Origen = '$_POST[origen]', Destino = '$_POST[destino]', Plazas_libres = $_POST[plazas] WHERE Matricula = '$_POST[matriculaAnterior]' AND Fecha = '$_POST[fechaAnterior]' AND Origen = '$_POST[origenAnterior]' AND Destino = '$_POST[destinoAnterior]'");
                    $modificado = "<br>El viaje se ha modificado<br>";
                }
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        $result = $conex->query("SELECT * FROM viajes");
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
    ?>
    <h2>Modificar / Borrar viaje</h2>
    <table border="1">
        <tr>
            <th>Fecha</th>
            <th>Matrícula</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Plazas libres</th>
            <th>Operación</th>
        </tr>
        <?php
        while ($reg = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>$reg[Fecha]</td>";
            echo "<td>$reg[Matricula]</td>";
            echo "<td>$reg[Origen]</td>";
            echo "<td>$reg[Destino]</td>";
            echo "<td>$reg[Plazas_libres]</td>";
            echo "<td><form action='' method='POST'>";
            echo "<input type='submit' name='mod' value='Modificar'><br>";
            echo "<input type='submit' name='borrar' value='Borrar'>";
            foreach ($reg as $index => $value) {
                echo "<input type='hidden' name='$index' value='$value'>";
            }
            echo "</form></td></tr>";
        }
        echo "</table>";
        if (isset($_POST['borrar']) && $borrado) {
            echo "<br>El viaje se ha borrado<br>";
        }
        if (isset($_POST["modificar"])) {
            echo $modificado;
        }
        if (isset($_POST['mod'])) {
            ?>
            <br>
            <form action="" method="POST">
                Fecha: <input type="date" name="fecha" value="<?php echo $_POST['Fecha'] ?>"><br>
                <input type="hidden" name="fechaAnterior" value="<?php echo $_POST['Fecha'] ?>">
                Matrícula: <select name="matricula"><br>
                    <?php
                    $result = $conex->query("SELECT * FROM autos");
                    while ($reg = $result->fetchObject()) {
                        echo "<option value='$reg->Matricula'";
                        if ($reg->Matricula == $_POST['Matricula']) {
                            echo "selected";
                        }
                        echo ">$reg->Matricula</option>";
                    }
                    ?>
                </select><br>
                <input type="hidden" name="matriculaAnterior" value="<?php echo $_POST['Matricula'] ?>">
                Origen: <input type="text" name="origen" value="<?php echo $_POST['Origen'] ?>"><br>
                <input type="hidden" name="origenAnterior" value="<?php echo $_POST['Origen'] ?>">
                Destino: <input type="text" name="destino" value="<?php echo $_POST['Destino'] ?>"><br>
                <input type="hidden" name="destinoAnterior" value="<?php echo $_POST['Destino'] ?>">
                Plazas libres: <input type="text" name="plazas" value="<?php echo $_POST['Plazas_libres'] ?>"><br><br>
                <input type="submit" name="modificar" value="Modificar">
            </form>
            <?php
        }
        ?>
        <br><a href='index.php'>Volver</a>
</body>

</html>