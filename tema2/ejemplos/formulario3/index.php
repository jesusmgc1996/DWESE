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
                Nº matrícula: <input type="text" name="matricula"><br>
                Curso: <select name="curso">
                    <option value="1º ESO">1º ESO</option>
                    <option value="2º ESO">2º ESO</option>
                    <option value="3º ESO">3º ESO</option>
                    <option value="4º ESO">4º ESO</option>
                    <option value="1º SMR">1º SMR</option>
                    <option value="2º SMR">2º SMR</option>
                    <option value="1º DAW">1º DAW</option>
                    <option value="2º DAW">2º DAW</option>
                </select><br>
                Precio: <input type="text" name="precio"><br><br>
                <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
                <input type="hidden" name="apell" value="<?php echo $_POST['apell']; ?>">
                <input type="submit" name="enviar2" value="Siguiente">
            </form>
            <?php
        } elseif (isset($_POST['enviar2'])) {
            ?>
            <h1>Datos de matrícula</h1>
            <?php
            echo "Nombre: " . $_POST['nombre'] . "<br>";
            echo "Apellidos: " . $_POST['apell'] . "<br>";
            echo "Nº matrícula: " . $_POST['matricula'] . "<br>";
            echo "Curso: " . $_POST['curso'] . "<br>";
            echo "Precio: " . $_POST['precio'] . "<br><br>";
            echo '<a href="">Inicio</a>';
        } else {
            ?>
            <form action="" method="POST">
                Nombre: <input type="text" name="nombre"><br>
                Apellidos: <input type="text" name="apell"><br><br>
                <input type="submit" name="enviar" value="Siguiente">
            </form>
            <?php
        }
        ?>
    </body>
</html>
