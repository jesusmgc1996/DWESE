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
        $a = array(0 => array("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37", "Teléfono" => 123456789),
            1 => array("Nombre" => "Jesús García", "Dirección" => "C/ Mi calle", "Teléfono" => 123456789));
        foreach ($a as $fila) {
            foreach ($fila as $ind => $valor) {
                echo "$ind: $valor<br>";
            }
            echo "<br>";
        }
        ?>
    </body>
</html>
