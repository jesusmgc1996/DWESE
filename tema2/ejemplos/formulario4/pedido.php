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
        <form action="confirmacion.php" method="POST">
            Dirección: <input type="text" name="direccion" value="<?php if (!empty($_POST['direccion'])) echo $_POST['direccion']; ?>"><br>
            Nº Tarjeta: <input type="text" name="tarjeta" value="<?php if (!empty($_POST['tarjeta'])) echo $_POST['tarjeta']; ?>"><br><br>
            <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
            <input type="hidden" name="apell" value="<?php echo $_POST['apell']; ?>">
            <input type="submit" name="enviar" value="Siguiente">
        </form>
    </body>
</html>
