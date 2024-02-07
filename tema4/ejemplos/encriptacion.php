<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    $pass = "jesus";
    $hash_md5 = md5($pass);
    echo "$hash_md5<br>";
    $hash_password = password_hash($pass, PASSWORD_DEFAULT);
    echo "$hash_password<br>";

    $pass_usu = "jesus";

    echo "<br>COMPROBACIÓN MD5<br>";
    if (md5($pass_usu) == $hash_md5) {
        echo "Has entrado<br>";
    } else {
        echo "Contraseña incorrecta<br>";
    }

    echo "<br>COMPROBACIÓN PASSWORD_HASH<br>";
    if (password_verify($pass_usu, $hash_password)) {
        echo "Has entrado<br>";
    } else {
        echo "Contraseña incorrecta<br>";
    }
    ?>
</body>

</html>