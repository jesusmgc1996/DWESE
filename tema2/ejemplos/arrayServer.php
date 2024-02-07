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
            echo "<tr><th>Índice</th><th>Valor</th></tr>";
            foreach ($_SERVER as $ind => $valor) {
                echo "<tr><td>$ind</td><td>$valor</td></tr>";
            }
            ?>
        </table>
    </body>
</html>
