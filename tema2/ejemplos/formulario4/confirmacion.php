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
        <h1>Confirma tus datos</h1>
        <?php
        echo "Nombre: " . $_POST['nombre'] . "<br>";
        echo "Apellidos: " . $_POST['apell'] . "<br>";
        echo "Dirección: " . $_POST['direccion'] . "<br>";
        echo "Nº tarjeta: " . $_POST['tarjeta'] . "<br><br>";
        ?>
        <form action="index.php" method="POST">
            <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST['apell']; ?>">
            <input type="hidden" name="direccion" value="<?php echo $_POST['direccion']; ?>">
            <input type="hidden" name="tarjeta" value="<?php echo $_POST['tarjeta']; ?>">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>
        <form action="" method="POST">
            <input type="submit" name="confirmar" value="Confirmar">
        </form>
    </body>
</html>
