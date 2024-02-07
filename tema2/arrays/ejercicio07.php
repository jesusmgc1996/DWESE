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
        $a = ["Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa"];
        echo "El array contiene " . count($a) . " elementos:";
        echo "<ul>";
        foreach ($a as $valor) {
            echo "<li>$valor</li>";
        }
        echo "</ul>";
        ?>
    </body>
</html>
