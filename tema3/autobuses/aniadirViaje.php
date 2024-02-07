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
        $conex = new PDO('mysql: host=localhost; dbname=autobuses; charset=utf8mb4', 'dwes', 'abc123.');
        $plazas = true;
        if (isset($_POST['aniadir'])) {
            try {
                $result = $conex->query("SELECT * FROM autos WHERE Matricula = '$_POST[matricula]'");
                if ($reg = $result->fetchObject()) {
                    if ($_POST['plazas'] > $reg->Num_plazas) {
                        $plazas = false;
                    }
                }
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        $result = $conex->query("SELECT * FROM autos");
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
    ?>
    <h2>Nuevo viaje</h2>
    <form action="" method="POST">
        Fecha: <input type="date" name="fecha"><br>
        Matrícula: <select name="matricula"><br>
            <?php
            while ($reg = $result->fetchObject()) {
                echo "<option value='$reg->Matricula'>$reg->Matricula</option>";
            }
            ?>
        </select><br>
        Origen: <input type="text" name="origen"><br>
        Destino: <input type="text" name="destino"><br>
        Plazas libres: <input type="text" name="plazas">
        <?php if (!$plazas)
            echo "<span style=color:red>Las plazas libres no pueden ser superiores a las plazas del autobús</span>" ?><br><br>
            <input type="submit" name="aniadir" value="Añadir">
        </form>
        <?php
        if (isset($_POST['aniadir']) && $plazas) {
            try {
                $conex->query("INSERT INTO viajes VALUES ('$_POST[fecha]', '$_POST[matricula]', '$_POST[origen]', '$_POST[destino]', '$_POST[plazas]')");
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
            echo "<br>Viaje añadido correctamente<br>";
        }
        ?>
    <br><a href="index.php">Volver</a>
</body>

</html>