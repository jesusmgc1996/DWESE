<?php
if (isset($_POST['subir'])) {
    echo "Nombre original: " . $_FILES['foto']['name'] . "<br>";
    echo "Nombre temporal: " . $_FILES['foto']['tmp_name'] . "<br>";
    echo "Tamaño: " . $_FILES['foto']['size'] . "<br>";
    echo "Tipo: " . $_FILES['foto']['type'] . "<br>";
    echo "Error: " . $_FILES['foto']['error'] . "<br><br>";

    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fichero = time() . "-" . $_FILES['foto']['name'];
        $ruta = "fotos/$fichero";
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        try {
            $conex = new mysqli("localhost", "dwes", "abc123.", "ficheros");
            $conex->query("insert into fotos (nombre, ruta) values ('$_POST[nombre]', '$ruta')");
            $conex->close();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    } else {
        echo "Se ha producido un error al subir el archivo";
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre"><br>
    Fichero: <input type="file" name="foto"><br><br>
    <input type="submit" name="subir" value="Subir ficheros">
    <input type="submit" name="mostrar" value="Mostrar fotos">
</form>

<?php
if (isset($_POST['mostrar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "ficheros");
        $result = $conex->query("select * from fotos");
        if ($result->num_rows) {
            while ($reg = $result->fetch_object()) {
                //echo "<a href='$reg->ruta' target='_blank'><img src='$reg->ruta' width='50' height='50'></a>";
                echo "<a href='mostrar.php?ruta=$reg->ruta'><img src='$reg->ruta' width='50' height='50'></a>";
            }
        } else {
            echo "No se ha encontrado ninguna foto";
        }
        $conex->close();
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}