<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="dwes.css" rel="stylesheet" type="text/css">
    <title></title>
</head>

<body>
    <?php
    if (isset($_POST['editar'])) {
        ?>
        <div id="encabezado">
            <h1>Tarea: Edición de un producto</h1>
        </div>
        <?php
        try {
            $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conex = new PDO('mysql: host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.', $opt);
            $result = $conex->query("SELECT * FROM producto WHERE cod = '$_POST[producto]'");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
        ?>
        <div id="contenido">
            <form action="listado.php" method="POST">
                <h2>Producto:</h2>
                <?php
                while ($reg = $result->fetchObject()) {
                    echo "Nombre corto: <input type='text' name='nombre_corto' value='$reg->nombre_corto' style='width: 375px'><br><br>";
                    echo "Nombre:<br><br><textarea name='nombre' style='resize: none; width: 475px; height: 50px'>$reg->nombre</textarea><br><br>";
                    echo "Descripción:<br><br><textarea name='descripcion' style='resize: none; width: 475px; height: 125px'>$reg->descripcion</textarea><br><br>";
                    echo "PVP: <input type='text' name='pvp' value='$reg->PVP' style='width: 75px'><br><br>";
                    echo "<input type='submit' name='actualizar' value='Actualizar'> ";
                    echo "<input type='submit' name='cancelar' value='Cancelar'>";
                    echo "<input type='hidden' name='cod' value='$reg->cod'>";
                }
                ?>
            </form>
        </div>
        <?php
    } else {
        header("Location: listado.php");
    }
    ?>
</body>

</html>