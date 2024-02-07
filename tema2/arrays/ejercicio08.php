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
        $suma = 0;
        $cont = 0;
        for ($i = 1; $i <= 10; $i++) {
            $a[] = $i;
        }
        foreach ($a as $ind => $valor) {
            if ($ind % 2 == 0) {
                $suma += $valor;
                $cont++;
            } else {
                echo "$valor<br>";
            }
        }
        echo "Media: " . ($suma / $cont);
        ?>
    </body>
</html>
