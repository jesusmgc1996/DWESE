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
            if ($b >= $c) {
                echo "$a > $b > $c";
            } else {
                echo "$a > $c > $b";
            }
        } elseif ($b >= $a && $b >= $c) {
            if ($a >= $c) {
                echo "$b > $a > $c";
            } else {
                echo "$b > $c > $a";
            }
        } else {
            if ($a >= $b) {
                echo "$c > $a > $b";
            } else {
                echo "$c > $b > $a";
            }
        }
        ?>
    </body>
</html>
