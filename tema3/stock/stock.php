<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="dwes.css">
</head>

<body>
    <?php
    try {
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        $result = $conex->query("SELECT * FROM producto ORDER BY nombre_corto");
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    ?>
    <div id="encabezado">
        <h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>
        <form action="" method="POST">
            Producto: <select name="producto">
                <?php
                while ($reg = $result->fetch_object()) {
                    echo "<option value='$reg->cod'";
                    if (isset($_POST['producto']) && $_POST['producto'] == $reg->cod) {
                        echo "selected";
                    }
                    echo ">$reg->nombre_corto</option>";
                }
                ?>
            </select>
            <input type="submit" name="mostrar" value="Mostrar stock">
        </form>
    </div>
    <?php
    if (isset($_POST['mostrar'])) {
        try {
            $result = $conex->query("SELECT nombre, unidades, cod FROM tienda, stock WHERE cod = tienda AND producto = '$_POST[producto]'");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        ?>
        <div id="contenido">
            <h2>Stock del producto en las tiendas:</h2>
            <form action="" method="POST">
                <?php
                while ($reg = $result->fetch_object()) {
                    echo "Tienda: $reg->nombre: ";
                    echo "<input type='text' name='unidades[]' value='$reg->unidades'>";
                    echo " unidades<br><br>";
                    echo "<input type='hidden' name='tienda[]' value='$reg->cod'>";
                }
                ?>
                <input type="submit" name="actualizar" value="Actualizar">
                <input type="hidden" name="producto" value="<?php echo $_POST['producto'] ?>">
            </form>
        </div>
        <?php
    }
    if (isset($_POST['actualizar'])) {
        try {
            $stmt = $conex->prepare("UPDATE stock SET unidades = ? WHERE tienda = ? AND producto = '$_POST[producto]'");
            for ($i = 0; $i < count($_POST['tienda']); $i++) {
                $stmt->bind_param('ii', $_POST['unidades'][$i], $_POST['tienda'][$i]);
                $stmt->execute();
            }
            echo "<div id='contenido'><br>Stock actualizado</div>";
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $stmt->close();
    }
    $conex->close();
    ?>
</body>

</html>