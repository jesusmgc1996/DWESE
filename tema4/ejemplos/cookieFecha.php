<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['acceso'])) {
        setcookie("acceso", date("d-m-Y H:i:s"));
        echo "Bienvenido, es su primer acceso";
    } else {
        setcookie("acceso", date("d-m-Y H:i:s"));
        echo "Su anterior visita fue: $_COOKIE[acceso]";
    }
    ?>
</body>

</html>