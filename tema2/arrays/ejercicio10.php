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
        <table border="1">
            <?php
            $numeros = array("Uno" => 3, "Dos" => 2, "Tres" => 8, "Cuatro" => 123, "Cinco" => 5, "Seis" => 1);
            asort($numeros);
            foreach ($numeros as $ind => $valor) {
                echo "<tr><th>$ind</th><td>$valor</td></tr>";
            }
            ?>
        </table>
    </body>
</html>
