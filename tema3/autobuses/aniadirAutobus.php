<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>Nuevo autobús</h2>
    <form action="" method="POST">
        Matrícula: <input type="text" name="matricula"><br>
        Marca: <input type="text" name="marca"><br>
        Nº plazas: <input type="text" name="plazas"><br><br>
        <input type="submit" name="aniadir" value="Añadir">
    </form>
    <?php
    if (isset($_POST['aniadir'])) {
        try {
            $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conex = new PDO('mysql: host=localhost; dbname=autobuses; charset=utf8mb4', 'dwes', 'abc123.');
            $conex->query("INSERT INTO autos VALUES ('$_POST[matricula]', '$_POST[marca]', '$_POST[plazas]')");
            echo "<br>Autobús añadido correctamente<br>";
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    ?>
    <br><a href="index.php">Volver</a>
</body>

</html>