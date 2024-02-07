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
        $a = 0;
        $i = 1;
        do {
            $a += $i;
            $i++;
        } while ($i <= 100);
        echo "$a<br>";
        $a = 0;
        $i = 1;
        while ($i <= 100) {
            $a += $i;
            $i++;
        }
        echo "$a<br>";
        $a = 0;
        for ($i = 1; $i <= 100; $i++) {
            $a += $i;
        }
        echo $a;
        ?>
    </body>
</html>
