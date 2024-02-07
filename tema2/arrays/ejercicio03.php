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
        $a = array("enero" => 9, "febrero" => 12, "marzo" => 0, "abril" => 17);
        foreach ($a as $ind => $valor) {
            if ($valor != 0) {
                echo "$ind: $valor<br>";
            }
        }
        ?>
    </body>
</html>
