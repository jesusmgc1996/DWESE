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
        include 'fecha.php';
        $dia = 0;
        $mes = 0;
        $d = 0;
        $a = 0;
        $t = mktime(12, 0, 0, 9, 1, 2023);
        fecha($dia, $mes, $d, $a, $t);
        echo "$dia, $d de $mes de $a";
        ?>
    </body>
</html>
