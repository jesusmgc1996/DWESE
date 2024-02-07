<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $a = 2023;
        if ($a % 4 == 0) {
            if ($a % 100 == 0) {
                if ($a % 400 == 0) {
                    echo "Es año bisiesto.";
                } else {
                    echo "No es año bisiesto.";
                }
            } else {
                echo "Es año bisiesto.";
            }
        } else {
            echo "No es año bisiesto.";
        }
        ?>
    </body>
</html>
