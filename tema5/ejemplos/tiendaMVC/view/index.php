<?php
require_once "../controller/ProductoController.php";

if (isset($_POST['insertar'])) {
    $p = new Producto($_POST['cod'], $_POST['nombre'], $_POST['precio']);
    $filas = ProductoController::insertarProducto($p);
    if ($filas === false) {
        echo "Se ha producido un error en la base de datos<br><br>";
    } else {
        echo "Se han insertado $filas registros<br><br>";
    }
}
?>

<form action="" method="post">
    Código: <input type="text" name="cod"><br>
    Nombre: <input type="text" name="nombre"><br>
    Precio: <input type="text" name="precio"><br><br>
    <input type="submit" name="insertar" value="Insertar">
    <input type="submit" name="mostrar" value="Mostrar">
    <input type="submit" name="buscar" value="Buscar">
</form><br>

<?php
if (isset($_POST['buscar'])) {
    ?>
    <form action="" method="post">
        Código del producto: <input type="text" name="cod"><br><br>
        <input type="submit" name="buscarCod" value="Buscar">
    </form>
    <?php
}

if (isset($_POST['buscarCod'])) {
    $p = ProductoController::buscarProducto($_POST['cod']);
    if ($p === false) {
        echo "Se ha producido un error en la base de datos";
    } elseif ($p) {
        echo $p;
    } else {
        echo "No se ha encontrado ningún producto con el código introducido";
    }
}

if (isset($_POST['mostrar'])) {
    $productos = ProductoController::mostrarTodos();
    if ($productos === false) {
        echo "Se ha producido un error en la base de datos";
    } elseif ($productos) {
        foreach ($productos as $p) {
            echo $p;
        }
    } else {
        echo "No se ha encontrado ningún producto";
    }
}