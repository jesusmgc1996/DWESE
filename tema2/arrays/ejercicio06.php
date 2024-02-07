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
        $a = ["Madrid", "Barcelona", "Londres", "New York", "Los Ángeles", "Chicago"];
        foreach ($a as $ind => $valor) {
            echo "La ciudad con el índice $ind tiene el nombre de $valor.<br>";
        }
        ?>
    </body>
</html>
