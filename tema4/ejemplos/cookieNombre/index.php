<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['nombre'])) {
        setcookie("nombre", "Pepe", time() + 60);
    } else {
        echo $_COOKIE['nombre'];
    }
    ?>
    <br><br><a href="cookie.php">Siguiente</a>
</body>

</html>