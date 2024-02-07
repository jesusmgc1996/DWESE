<?php
session_start();
if (isset($_POST['aceptar'])) {
    try {
        $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql: host=localhost; dbname=logueo; charset=utf8mb4', 'dwes', 'abc123.', $opt);
        $result = $conex->query("select * from usuario where user = '$_POST[user]'");
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
    if ($result->rowCount() > 0) {
        $errorUser = true;
    }
    if ($_POST['pass'] != $_POST['repetir']) {
        $errorPass = true;
    }
}
if (isset($_POST['aceptar']) && !isset($errorUser) && !isset($errorPass)) {
    $pass = md5($_POST['pass']);
    $conex->exec("insert into usuario values ('$_POST[nombre]', '$_POST[apell]', '$_POST[dir]', '$_POST[loc]', '$_POST[user]', '$pass', '$_POST[color]', '$_POST[fondo]', '$_POST[tipo]', $_POST[tam])");
    $result = $conex->query("select * from usuario where user = '$_POST[user]'");
    $_SESSION['sesion'] = $result->fetchObject();
    header("location: inicio.php");
} else {
    ?>
    <h1>FORMULARIO DE REGISTRO</h1>
    <form action="" method="post">
        Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['aceptar'])) echo $_POST['nombre'] ?>" required><br>
        Apellidos: <input type="text" name="apell" value="<?php if (isset($_POST['aceptar'])) echo $_POST['apell'] ?>" required><br>
        Dirección: <input type="text" name="dir" value="<?php if (isset($_POST['aceptar'])) echo $_POST['dir'] ?>" required><br>
        Localidad: <input type="text" name="loc" value="<?php if (isset($_POST['aceptar'])) echo $_POST['loc'] ?>" required><br>
        Usuario: <input type="text" name="user" value="<?php if (isset($_POST['aceptar']) && !isset($errorUser)) echo $_POST['user'] ?>" required><br>
        <?php if (isset($errorUser)) echo "<span style='color:red'>El usuario ya existe</span><br>"; ?>
        Contraseña: <input type="password" name="pass" value="<?php if (isset($_POST['aceptar']) && !isset($errorPass)) echo $_POST['pass'] ?>" required><br>
        Repita contraseña: <input type="password" name="repetir" value="<?php if (isset($_POST['aceptar']) && !isset($errorPass)) echo $_POST['pass'] ?>" required><br>
        <?php if (isset($errorPass)) echo "<span style='color:red'>Las contraseñas deben coincidir</span><br>"; ?>
        Color de letra: <select name="color" required>
            <option value="black">Negro</option>
            <option value="white">Blanco</option>
            <option value="blue">Azul</option>
            <option value="red">Rojo</option>
        </select><br>
        Color de fondo: <select name="fondo" required>
            <option value="white">Blanco</option>
            <option value="black">Negro</option>
            <option value="red">Rojo</option>
            <option value="blue">Azul</option>
        </select><br>
        Tipo de letra: <select name="tipo" required>
            <option value="Arial, sans-serif">Arial</option>
            <option value="Times New Roman, serif">Times New Roman</option>
        </select><br>
        Tamaño de letra: <select name="tam" required>
            <option value="10">10</option>
            <option value="12">12</option>
        </select><br><br>
        <input type="submit" name="aceptar" value="Aceptar">
    </form>
    <form action="index.php" method="post">
        <input type="submit" name="cancelar" value="Cancelar">
    </form>
    <?php
}
