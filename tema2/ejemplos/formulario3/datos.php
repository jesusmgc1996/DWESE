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
        <h1>Datos de matrícula</h1>
        <?php
        echo "Nombre: " . $_POST['nombre'] . "<br>";
        echo "Apellidos: " . $_POST['apell'] . "<br>";
        echo "Nº matrícula: " . $_POST['matricula'] . "<br>";
        echo "Curso: " . $_POST['curso'] . "<br>";
        echo "Precio: " . $_POST['precio'] . "<br><br>";
        echo '<a href="index.php">Inicio</a>';
        ?>
    </body>
</html>
