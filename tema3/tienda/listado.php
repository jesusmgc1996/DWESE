<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="dwes.css" rel="stylesheet" type="text/css">
    <title></title>
</head>

<body>
    <?php
    try {
        $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql: host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $opt);
        $result = $conex->query("SELECT * FROM familia");
        ?>
        <div id="encabezado">
            <h1>Tarea: Listado de productos de una familia</h1>
            <form action="" method="POST">
                Familia: <select name="familia">
                    <?php
                    while ($reg = $result->fetchObject()) {
                        echo "<option value='$reg->cod'";
                        if (isset($_POST['familia']) && $_POST['familia'] == $reg->cod) {
                            echo "selected";
                        }
                        echo ">$reg->nombre</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="mostrar" value="Mostrar productos">
            </form>
        </div>
        <?php
        if (isset($_POST['mostrar'])) {
            try {
                $result = $conex->query("SELECT * FROM producto WHERE familia = '$_POST[familia]'");
            } catch (PDOException $e) {
                die($ex->getMessage());
            }
            ?>
            <div id="contenido">
                <h2>Productos de la familia:</h2>
                <?php
                while ($reg = $result->fetchObject()) {
                    echo "<form action='editar.php' method='POST'>";
                    echo "Producto: $reg->nombre_corto: $reg->PVP euros ";
                    echo "<input type='submit' name='editar' value='Editar'><br><br>";
                    echo "<input type='hidden' name='producto' value='$reg->cod'>";
                    echo "</form>";
                }
                ?>
            </div>
            <?php
        }
        if (isset($_POST['actualizar'])) {
            try {
                $conex->exec("UPDATE producto SET nombre = '$_POST[nombre]', nombre_corto = '$_POST[nombre_corto]', descripcion = '$_POST[descripcion]', PVP = '$_POST[pvp]' WHERE cod = '$_POST[cod]'");
                echo "<div id='contenido'><br>Se han actualizado los datos</div>";
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
        }
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
    ?>
</body>

</html>