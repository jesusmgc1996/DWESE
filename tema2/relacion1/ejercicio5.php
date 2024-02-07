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
            $a = 1;
            $i = 0;
            while ($i < 5) {
                echo "<tr>";
                $j = 0;
                while ($j < 7) {
                    echo "<td>$a</td>";
                    $a += 1;
                    $j++;
                }
                echo "</tr>";
                $i++;
            }
            ?>
        </table>
        <table border="1">
            <?php
            $a = 1;
            $i = 0;
            do {
                echo "<tr>";
                $j = 0;
                do {
                    echo "<td>$a</td>";
                    $a += 1;
                    $j++;
                } while ($j < 7);
                echo "</tr>";
                $i++;
            } while ($i < 5);
            ?>
        </table>
    </body>
</html>
