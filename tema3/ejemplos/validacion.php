<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    $nombre = true;
    $dni = true;
    $fecha = true;
    $email = true;
    $edad = true;
    $error = false;
    if (isset($_POST['aceptar'])) {
        if (empty($_POST['nombre']) || !preg_match('/^[a-zA-Z\s]{1,30}$/', $_POST['nombre'])) {
            $nombre = false;
            $error = true;
        }
        if (empty($_POST['dni']) || !preg_match('/^\d{8}-[A-Z]$/', $_POST['dni'])) {
            $dni = false;
            $error = true;
        }
        $fechaNac = explode("-", $_POST['fecha']);
        if (empty($_POST['fecha']) || !preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fecha']) || !checkdate($fechaNac[1], $fechaNac[0], $fechaNac[2])) {
            $fecha = false;
            $error = true;
        }
        if (empty($_POST['email']) || !preg_match('/^[a-zA-Z\d]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/', $_POST['email'])) {
            $email = false;
            $error = true;
        }
        if (empty($_POST['edad']) || !preg_match('/^\d+$/', $_POST['edad']) || !($_POST['edad'] >= 18)) {
            $edad = false;
            $error = true;
        }
    }
    if (isset($_POST['aceptar']) && $nombre && $dni && $fecha && $email && $edad) {
        echo "Todos los datos son correctos";
    } else {
        ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre" value="<?php if ($nombre && $error)
                echo $_POST['nombre']; ?>">
            <?php if (!$nombre)
                echo '<span style=color:red>El nombre debe contener solo texto con un máximo de 30 caracteres</span>' ?><br>
                DNI: <input type="text" name="dni" value="<?php if ($dni && $error)
                echo $_POST['dni']; ?>">
            <?php if (!$dni)
                echo '<span style=color:red>El DNI debe contener 8 dígitos seguidos de un guión (-) y una letra mayúscula</span>' ?><br>
                Fecha de nacimiento: <input type="text" name="fecha"
                    value="<?php if ($fecha && $error)
                echo $_POST['fecha']; ?>">
            <?php if (!$fecha)
                echo '<span style=color:red>La fecha no es correcta o no tiene el siguiente formato: "dd-mm-aaaa"</span>' ?><br>
                E-mail: <input type="text" name="email" value="<?php if ($email && $error)
                echo $_POST['email']; ?>">
            <?php if (!$email)
                echo '<span style=color:red>El email debe tener el siguiente formato: "texto@texto.texto"</span>' ?><br>
                Edad: <input type="text" name="edad" value="<?php if ($edad && $error)
                echo $_POST['edad']; ?>">
            <?php if (!$edad)
                echo '<span style=color:red>La edad debe ser 18 o más y solo puede contener dígitos</span>' ?><br><br>
                <input type="submit" name="aceptar" value="Aceptar">
            </form>
        <?php
    }
    ?>
</body>

</html>