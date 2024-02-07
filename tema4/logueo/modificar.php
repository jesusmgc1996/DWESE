<?php
session_start();
$reg = $_SESSION['sesion'];
try {
    $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conex = new PDO('mysql: host=localhost; dbname=logueo; charset=utf8mb4', 'dwes', 'abc123.', $opt);
    if (isset($_POST['modificar'])) {
        if ($_POST['pass'] != $_POST['repetir']) {
            echo "<br>Las contraseñas deben coincidir<br><br>";
            $error = true;
        }
        if (!isset($error)) {
            $pass = md5($_POST['pass']);
            $conex->exec("update usuario set nombre = '$_POST[nombre]', apellidos = '$_POST[apell]', direccion = '$_POST[dir]', localidad = '$_POST[loc]', pass = '$pass', color_letra = '$_POST[color]', color_fondo = '$_POST[fondo]', tipo_letra = '$_POST[tipo]', tam_letra = $_POST[tam] where user = '$reg->user'");
            $result = $conex->query("select * from usuario where user = '$reg->user'");
            $_SESSION['sesion'] = $result->fetchObject();
            header("location: inicio.php");
        }
    }
} catch (PDOException $ex) {
    die($ex->getMessage());
}
?>
<a href="cerrar.php">Salir</a><br><br>
<form action="" method="post">
    Nombre: <input type="text" name="nombre" value="<?php echo $reg->nombre ?>" required><br>
    Apellidos: <input type="text" name="apell" value="<?php echo $reg->apellidos ?>" required><br>
    Dirección: <input type="text" name="dir" value="<?php echo $reg->direccion ?>" required><br>
    Localidad: <input type="text" name="loc" value="<?php echo $reg->localidad ?>" required><br>
    Contraseña: <input type="password" name="pass" required><br>
    Repita contraseña: <input type="password" name="repetir" required><br>
    Color de letra: <select name="color" required>
        <option value="black" <?php if ($reg->color_letra == "black") echo "selected" ?>>Negro</option>
        <option value="white" <?php if ($reg->color_letra == "white") echo "selected" ?>>Blanco</option>
        <option value="blue" <?php if ($reg->color_letra == "blue") echo "selected" ?>>Azul</option>
        <option value="red" <?php if ($reg->color_letra == "red") echo "selected" ?>>Rojo</option>
    </select><br>
    Color de fondo: <select name="fondo" required>
        <option value="white" <?php if ($reg->color_fondo == "white") echo "selected" ?>>Blanco</option>
        <option value="black" <?php if ($reg->color_fondo == "black") echo "selected" ?>>Negro</option>
        <option value="red" <?php if ($reg->color_fondo == "red") echo "selected" ?>>Rojo</option>
        <option value="blue" <?php if ($reg->color_fondo == "blue") echo "selected" ?>>Azul</option>
    </select><br>
    Tipo de letra: <select name="tipo" required>
        <option value="Arial, sans-serif" <?php if ($reg->tipo_letra == "Arial, sans-serif") echo "selected" ?>>Arial</option>
        <option value="Times New Roman, serif" <?php if ($reg->tipo_letra == "Times New Roman, serif") echo "selected" ?>>Times New Roman</option>
    </select><br>
    Tamaño de letra: <select name="tam" required>
        <option value="10" <?php if ($reg->tam_letra == "10") echo "selected" ?>>10</option>
        <option value="12" <?php if ($reg->tam_letra == "12") echo "selected" ?>>12</option>
    </select><br><br>
    <input type="submit" name="modificar" value="Modificar">
</form>
<a href="inicio.php">Volver</a>