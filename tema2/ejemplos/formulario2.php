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
                Estado civil: <input type="radio" name="estado" value="Soltero">Soltero
                <input type="radio" name="estado" value="Casado">Casado<br>
                Edad: <select name="edad">
                    <option value="Entre 1 y 14 años">Entre 1 y 14 años</option>
                    <option value="Entre 15 y 25 años">Entre 15 y 25 años</option>
                    <option value="Entre 26 y 35 años">Entre 26 y 35 años</option>
                    <option value="Más de 35 años">Más de 35 años</option>
                </select><br>
                Estudios: <select name="estudios[]" multiple>
                    <option value="ESO">ESO</option>
                    <option value="Bachillerato">Bachillerato</option>
                    <option value="CFGM">CFGM</option>
                    <option value="CFGS">CFGS</option>
                    <option value="Universidad">Universidad</option>
                </select><br>
                <input type = "hidden" name = "nombre" value = "<?php echo $_POST['nombre']; ?>">
                <input type = "hidden" name = "apell" value = "<?php echo $_POST['apell']; ?>">
                <input type = "hidden" name = "sexo" value = "<?php echo $_POST['sexo']; ?>">
                <input type = "hidden" name = "aficiones" value = "<?php echo implode(";", $_POST['aficiones']); ?>">
                <input type = "submit" name = "enviar2" value = "Siguiente">
            </form>
            <?php
        } elseif (isset($_POST['enviar2'])) {
            ?>
            <h1>Datos</h1>
            <?php
            echo "Nombre: " . $_POST['nombre'] . "<br>";
            echo "Apellidos: " . $_POST['apell'] . "<br>";
            echo "Sexo: " . $_POST['sexo'] . "<br>";
            $aficiones = explode(";", $_POST['aficiones']);
            echo "Aficiones: ";
            foreach ($aficiones as $valor) {
                echo $valor . " ";
            }
            echo "<br>Estado civil: " . $_POST['estado'] . "<br>";
            echo "Edad: " . $_POST['edad'] . "<br>";
            echo "Estudios: ";
            foreach ($_POST['estudios'] as $valor) {
                echo $valor . " ";
            }
        } else {
            ?>
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Apellidos: <input type="text" name="apell"><br>
                Sexo: <input type="radio" name="sexo" value="Hombre">Hombre
                <input type="radio" name="sexo" value="Mujer">Mujer
                <input type="radio" name="sexo" value="Otro">Otro<br>
                Aficiones: <input type="checkbox" name="aficiones[]" value="Cine">Cine
                <input type="checkbox" name="aficiones[]" value="Lectura">Lectura
                <input type="checkbox" name="aficiones[]" value="Televisión">Televisión<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="aficiones[]" value="Deporte">Deporte
                <input type="checkbox" name="aficiones[]" value="Música">Música<br><br>
                <input type="submit" name="enviar" value="Siguiente">
                <?php
            }
            ?>
        </form>
    </body>
</html>
