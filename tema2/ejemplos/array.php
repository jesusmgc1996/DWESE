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
            $a = array("Contabilidad" => array("Nombre" => "Juan", "Apellidos" => "García", "Salario" => 1000, "Edad" => 20),
                "Marketing" => array("Nombre" => "Pepe", "Apellidos" => "Velázquez", "Salario" => 1500, "Edad" => 25),
                "Ventas" => array("Nombre" => "Ismael", "Apellidos" => "Sánchez", "Salario" => 2000, "Edad" => 30),
                "Informática" => array("Nombre" => "Carmen", "Apellidos" => "Carrasco", "Salario" => 2500, "Edad" => 35),
                "Dirección" => array("Nombre" => "María", "Apellidos" => "Cantero", "Salario" => 3000, "Edad" => 40));
            echo "<tr><th></th>";
            foreach ($a["Contabilidad"] as $ind => $fila) {
                echo "<th>$ind</th>";
            }
            echo "</tr>";
            foreach ($a as $ind => $fila) {
                echo "<tr><th>$ind</th>";
                foreach ($fila as $valor) {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
