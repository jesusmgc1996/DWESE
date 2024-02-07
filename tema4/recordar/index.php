<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    if (isset($_COOKIE['registrado'])) {
        setcookie("registrado", "", time() - 60);
        echo "Usuario registrado correctamente<br><br>";
    }
    if (isset($_POST['acceder'])) {
        try {
            $conex = new PDO("mysql: host=localhost; dbname=usuarios; charset=utf8mb4", "dwes", "abc123.");
            $result = $conex->query("SELECT * FROM usuarios WHERE Usuario = '$_POST[usuario]'");
            if ($reg = $result->fetchObject()) {
                if (password_verify($_POST['password'], $reg->Contraseña)) {
                    setcookie("nombre", $reg->Nombre);
                    setcookie("apellidos", $reg->Apellidos);
                    if ($_POST['recordar']) {
                        setcookie("usuario", $_POST['usuario']);
                        setcookie("password", $_POST['password']);
                        setcookie("recordar", 1);
                    } else {
                        setcookie("usuario", "", time() - 60);
                        setcookie("password", "", time() - 60);
                        setcookie("recordar", "", time() - 60);
                    }
                    header("location:acceso.php");
                } else {
                    $error = "Contraseña incorrecta";
                }
            } else {
                $error = "Usuario incorrecto";
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    ?>
    <form action="" method="POST">
        Usuario: <input type="text" name="usuario" value="<?php if (isset($_COOKIE['recordar'])) echo "$_COOKIE[usuario]"; ?>"><br>
        Contraseña: <input type="password" name="password" value="<?php if (isset($_COOKIE['recordar'])) echo "$_COOKIE[password]"; ?>"><br>
        Recordarme: <input type="checkbox" name="recordar" <?php if (isset($_COOKIE['recordar'])) echo "checked"; ?>><br><br>
        <input type="submit" name="acceder" value="Acceder">
    </form><br>
    <form action="registro.php" method="POST">
        <input type="submit" name="registrar" value="Registrarse">
    </form>
    <?php
    if (isset($error)) {
        echo "<br>$error";
    }
    ?> 
</body>

</html>