<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    if (isset($_POST['registrarse'])) {
        try {
            $conex = new PDO("mysql: host=localhost; dbname=usuarios; charset=utf8mb4", "dwes", "abc123.");
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $conex->exec("INSERT INTO usuarios VALUES ('$_POST[nombre]', '$_POST[apellidos]', '$_POST[usuario]', '$password')");
            setcookie("registrado", "si");
            header("location:index.php");
        } catch (PDOException $ex) {
           die($ex->getMessage());
        }
    }
    ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Apellidos: <input type="text" name="apellidos"><br>
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="password"><br><br>
        <input type="submit" name="registrarse" value="Registrarse">
    </form>
    <br><a href="index.php">Volver</a>
</body>

</html>