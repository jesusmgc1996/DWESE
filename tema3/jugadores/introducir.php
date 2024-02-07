<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>Jugador</h2>
    <?php
    require_once('funciones.php');
    $nombre = true;
    $dni = true;
    $posiciones = true;
    $equipo = true;
    $goles = true;
    $error = false;
    if (isset($_POST['enviar'])) {
        if (empty($_POST['nombre']) || validarNombre($_POST['nombre'])) {
            $nombre = false;
            $error = true;
        }
        if (empty($_POST['dni']) || validarDni($_POST['dni'])) {
            $dni = false;
            $error = true;
        }
        if (!isset($_POST['posiciones'])) {
            $posiciones = false;
            $error = true;
        }
        if (empty($_POST['equipo'])) {
            $equipo = false;
            $error = true;
        }
        if (!isset($_POST['goles']) || validarGoles($_POST['goles'])) {
            $goles = false;
            $error = true;
        }
    }
    ?>
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre" value="<?php if ($nombre && $error) echo $_POST['nombre']; ?>">
        <?php if (!$nombre) echo '<span style=color:red>El nombre debe contener solo texto</span>' ?><br>
        DNI: <input type="text" name="dni" value="<?php if ($dni && $error) echo $_POST['dni']; ?>">
        <?php if (!$dni) echo '<span style=color:red>El DNI debe contener 8 dígitos seguidos de una letra mayúscula</span>' ?><br>
        Dorsal: <select name="dorsal">
            <?php
            for ($i = 1; $i <= 25; $i++) {
                echo "<option value='$i'";
                if ($error && $_POST['dorsal'] == $i) {
                    echo " selected";
                }
                echo ">$i</option>";
            }
            ?>
        </select><br>
        Posición: <select name="posiciones[]" multiple="">
            <option value="1" <?php if ($error && $posiciones && in_array('1', $_POST['posiciones'])) echo "selected"; ?>>Portero</option>
            <option value="2" <?php if ($error && $posiciones && in_array('2', $_POST['posiciones'])) echo "selected"; ?>>Defensa</option>
            <option value="4" <?php if ($error && $posiciones && in_array('4', $_POST['posiciones'])) echo "selected"; ?>>Centrocampista</option>
            <option value="8" <?php if ($error && $posiciones && in_array('8', $_POST['posiciones'])) echo "selected"; ?>>Delantero</option>
        </select>
        <?php if (!$posiciones) echo '<span style=color:red>Debe seleccionar al menos una posición</span>' ?><br>
        Equipo: <input type="text" name="equipo" value="<?php if ($equipo && $error) echo $_POST['equipo']; ?>">
        <?php if (!$equipo) echo '<span style=color:red>El equipo no puede estar vacío</span>' ?><br>
        Goles: <input type="text" name="goles" value="<?php if ($goles && $error) echo $_POST['goles']; ?>">
        <?php if (!$goles) echo '<span style=color:red>Los goles solo pueden contener dígitos</span>' ?><br><br>
        <input type="submit" name="insertar" value="Insertar">
    </form>
    <?php
    if (isset($_POST['insertar']) && !$error) {
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            $conex->set_charset('utf8mb4');
            $posiciones = 0;
            foreach ($_POST['posiciones'] as $value) {
                $posiciones += $value;
            }
            $conex->query("INSERT INTO jugadores VALUES ('$_POST[nombre]', '$_POST[dni]', '$_POST[dorsal]', '$posiciones', '$_POST[equipo]', '$_POST[goles]')");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        echo "<br>Registro insertado correctamente<br>";
        echo "<br><a href='index.php'>Volver</a>";
        $conex->close();
    }
    ?>
</body>

</html>