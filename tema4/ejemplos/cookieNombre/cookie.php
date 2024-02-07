<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    setcookie("nombre", "Antonio", time() - 70);
    echo "El valor de la cookie es: $_COOKIE[nombre]";
    ?>
    <br><br><a href="index.php">Volver</a>
</body>

</html>