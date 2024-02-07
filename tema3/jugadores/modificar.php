<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h2>Modificar</h2>
    <?php
    $dni = true;
    if (isset($_POST['buscar']) && empty($_POST['dniBuscar'])) {
        $dni = false;
    }
    ?>
    <form action="" method="POST">
        DNI: <input type="text" name="dniBuscar">
        <?php if (!$dni) echo '<span style=color:red>El DNI no puede estar vacío</span>' ?><br><br>
        <input type="submit" name="buscar" value="Buscar">
        </form>
        <?php
        if (isset($_POST['buscar']) && $dni) {
            require_once('funciones.php');
            $nombre = true;
            $dni = true;
            $posiciones = true;
            $equipo = true;
            $goles = true;
            $error = false;
            if (isset($_POST['modificar'])) {
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
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
                $conex->set_charset('utf8mb4');
                $result = $conex->query("SELECT * FROM jugadores WHERE DNI = '$_POST[dniBuscar]'");
                if ($result->num_rows > 0) {
                    $reg = $result->fetch_object();
                    ?>
                    <br>
                    <form action="" method="POST">
                        Nombre: <input type="text" name="nombre" value="<?php if ($nombre && $error) echo $_POST['nombre']; else echo $reg->Nombre; ?>">
                        <?php if (!$nombre) echo '<span style=color:red>El nombre debe contener solo texto</span>' ?><br>
                        DNI: <input type="text" name="dni" value="<?php if ($dni && $error) echo $_POST['dni']; else echo $reg->DNI; ?>">
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
                        <?php
                        $posicion = explode(",", $reg->Posicion);
                        ?>
                        Posición: <select name="posiciones[]" multiple="">
                            <option value="1" <?php if ($error && $posiciones && in_array('1', $_POST['posiciones'])) echo "selected"; elseif (in_array('Portero', $posicion)) echo "selected"; ?>>Portero</option>
                            <option value="2" <?php if ($error && $posiciones && in_array('2', $_POST['posiciones'])) echo "selected"; elseif (in_array('Defensa', $posicion)) echo "selected"; ?>>Defensa</option>
                            <option value="4" <?php if ($error && $posiciones && in_array('4', $_POST['posiciones'])) echo "selected"; elseif (in_array('Centrocampista', $posicion)) echo "selected"; ?>>Centrocampista</option>
                            <option value="8" <?php if ($error && $posiciones && in_array('8', $_POST['posiciones'])) echo "selected"; elseif (in_array('Delantero', $posicion)) echo "selected"; ?>>Delantero</option>
                        </select>
                        <?php if (!$posiciones) echo '<span style=color:red>Debe seleccionar al menos una posición</span>' ?><br>
                        Equipo: <input type="text" name="equipo" value="<?php if ($equipo && $error) echo $_POST['equipo']; else echo $reg->Equipo; ?>">
                        <?php if (!$equipo) echo '<span style=color:red>El equipo no puede estar vacío</span>' ?><br>
                        Goles: <input type="text" name="goles" value="<?php if ($goles && $error) echo $_POST['goles']; else echo $reg->Goles; ?>">
                        <?php if (!$goles) echo '<span style=color:red>Los goles solo pueden contener dígitos</span>' ?><br><br>
                        <input type="submit" name="modificar" value="Modificar">
                        <input type="hidden" name="buscar" value="<?php echo "$_POST[buscar]"; ?>">
                        <input type="hidden" name="dniBuscar" value="<?php echo "$_POST[dniBuscar]"; ?>">
                    </form>
                    <?php
                } else {
                    echo "<br>No se han encontrado datos con el DNI introducido<br>";
                }
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if (isset($_POST['modificar']) && !$error) {
                try {
                    $posiciones = 0;
                    foreach ($_POST['posiciones'] as $value) {
                        $posiciones += $value;
                    }
                    $conex->query("UPDATE jugadores SET Nombre = '$_POST[nombre]', DNI = '$_POST[dni]', Dorsal = '$_POST[dorsal]', Posicion = '$posiciones', Equipo = '$_POST[equipo]', Goles = '$_POST[goles]'");
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
                echo "<br>Registro modificado correctamente<br>";
                echo "<br><a href='index.php'>Volver</a>";
                $conex->close();
            }
        }
        ?>
</body>

</html>