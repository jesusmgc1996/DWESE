<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_POST['enviar'])) {
            ?>
            <form action="" method="POST">
                Dirección: <input type = "text" name = "direccion" value = "<?php if (!empty($_POST['direccion'])) echo $_POST['direccion']; ?>"><br>
                Nº Tarjeta: <input type = "text" name = "tarjeta" value = "<?php if (!empty($_POST['tarjeta'])) echo $_POST['tarjeta']; ?>"><br><br>
                <input type = "hidden" name = "nombre" value = "<?php echo $_POST['nombre']; ?>">
                <input type = "hidden" name = "apell" value = "<?php echo $_POST['apell']; ?>">
                <input type = "hidden" name = "idiomas" value = "<?php echo implode(";", $_POST['idiomas']); ?>">
                <input type = "submit" name = "enviar2" value = "Siguiente">
            </form>
            <?php
        } elseif (isset($_POST['enviar2'])) {
            ?>
            <h1>Datos</h1>
            <?php
            echo "Nombre: " . $_POST['nombre'] . "<br>";
            echo "Apellidos: " . $_POST['apell'] . "<br>";
            $idiomas = explode(";", $_POST['idiomas']);
            echo "Idiomas: ";
            foreach ($idiomas as $valor) {
                echo $valor . " ";
            }
            echo "<br>Dirección: " . $_POST['direccion'] . "<br>";
            echo "Nº tarjeta: " . $_POST['tarjeta'] . "<br><br>";
            ?>
            <form action="" method="POST">
                <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
                <input type="hidden" name="apell" value="<?php echo $_POST['apell']; ?>">
                <input type="hidden" name="direccion" value="<?php echo $_POST['direccion']; ?>">
                <input type="hidden" name="tarjeta" value="<?php echo $_POST['tarjeta']; ?>">
                <input type="submit" name="cancelar" value="Cancelar">
            </form>
            <form action="" method="POST">
                <input type="submit" name="confirmar" value="Confirmar">
            </form>
            <?php
        } else {
            ?>
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['cancelar'])) echo $_POST['nombre']; ?>"><br>
                Apellidos: <input type="text" name="apell" value="<?php if (isset($_POST['cancelar'])) echo $_POST['apell']; ?>"><br>
                Idiomas: <input type="checkbox" name="idiomas[]" value="Español">Español<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="idiomas[]" value="Inglés">Inglés<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="idiomas[]" value="Francés">Francés<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="idiomas[]" value="Alemán">Alemán<br><br>
                <input type="submit" name="enviar" value="Siguiente">
                <?php
                if (isset($_POST['cancelar'])) {
                    ?>
                    <input type="hidden" name="direccion" value="<?php echo $_POST['direccion']; ?>">
                    <input type="hidden" name="tarjeta" value="<?php echo $_POST['tarjeta']; ?>">
                    <?php
                }
            }
            ?>
        </form>
    </body>
</html>
