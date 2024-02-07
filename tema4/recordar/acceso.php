<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['nombre'])) {
        header("location:index.php");
    } else {
        setcookie("acceso", date("d-m-Y H:i:s"));
        if (!isset($_COOKIE['acceso'])) {
            echo "Bienvenido $_COOKIE[nombre] $_COOKIE[apellidos], es su primer acceso";
        } else {
            echo "Bienvenido $_COOKIE[nombre] $_COOKIE[apellidos], su último acceso fue: $_COOKIE[acceso]";
        }
        setcookie("nombre", "", time() - 60);
        setcookie("apellidos", "", time() - 60);
    }
    ?>
    <br><br><a href="index.php">Volver</a>
</body>

</html>