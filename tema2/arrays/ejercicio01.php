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
        for ($i = 2; $i <= 20; $i += 2) {
            $a[] = $i;
        }
        foreach ($a as $valor) {
            echo "$valor<br>";
        }
        ?>
    </body>
</html>
