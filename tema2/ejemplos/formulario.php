<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    $nombre = true;
    $apell = true;
    $modulos = true;
    $error = false;
    if (isset($_POST['enviar'])) {
        if (empty($_POST['nombre'])) {
            $nombre = false;
            $error = true;
        }
        if (empty($_POST['apell'])) {
            $apell = false;
            $error = true;
        }
        if (!isset($_POST['modulos'])) {
            $modulos = false;
            $error = true;
        }
    }
    if (isset($_POST['enviar']) && $nombre && $apell && $modulos) {
        echo "Nombre: " . $_POST['nombre'] . "<br>";
        echo "Apellidos: " . $_POST['apell'] . "<br>";
        echo "Módulos:<ol>";
        foreach ($_POST['modulos'] as $valor) {
            echo "<li>$valor</li>";
        }
        echo "</ol>";
        echo '<a href="">Atrás</a>';
    } else {
        ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre" value="<?php if ($nombre && $error)
                echo $_POST['nombre']; ?>">
            <?php if (!$nombre)
                echo '<span style=color:red>El nombre no puede estar vacío</span>' ?><br>
                Apellidos: <input type="text" name="apell" value="<?php if ($apell && $error)
                echo $_POST['apell']; ?>">
            <?php if (!$apell)
                echo '<span style=color:red>El apellido no puede estar vacío</span>' ?><br>
                Módulos:
            <?php if (!$modulos)
                echo '<span style=color:red>Debe elegir al menos un módulo</span>' ?><br>
                Desarrollo Web Entorno Servidor:<input type="checkbox" name="modulos[]" value="DWESE" <?php if ($modulos && $error && in_array('DWESE', $_POST['modulos']))
                echo "checked"; ?>><br>
            Desarrollo Web Entorno Cliente:<input type="checkbox" name="modulos[]" value="DWECL" <?php if ($modulos && $error && in_array('DWECL', $_POST['modulos']))
                echo "checked"; ?>><br>
            Despliegue Aplicaciones Web:<input type="checkbox" name="modulos[]" value="DAW" <?php if ($modulos && $error && in_array('DAW', $_POST['modulos']))
                echo "checked"; ?>><br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
    }
    ?>
</body>

</html>