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
        $a = array("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37", "Teléfono" => 123456789);
        foreach ($a as $ind => $valor) {
            echo "$ind: $valor<br>";
        }
        ?>
    </body>
</html>
