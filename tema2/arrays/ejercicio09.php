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
            $estadios_de_futbol = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");
            foreach ($estadios_de_futbol as $ind => $valor) {
                echo "<tr><th>$ind</th><td>$valor</td></tr>";
            }
            ?>
        </table>
        <?php
        unset($estadios_de_futbol["Real Madrid"]);
        echo "<ol>";
        foreach ($estadios_de_futbol as $ind => $valor) {
            echo "<li>$ind => $valor</li>";
        }
        echo "</ol>";
        ?>
    </body>
</html>
