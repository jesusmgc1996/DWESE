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
        $a = 9;
        $b = 8;
        $c = 7;
        if ($a >= $b && $a >= $c) {
            echo "El valor máximo es $a.";
        } elseif ($b >= $a && $b >= $c) {
            echo "El valor máximo es $b.";
        } else {
            echo "El valor máximo es $c.";
        }
        ?>
    </body>
</html>
