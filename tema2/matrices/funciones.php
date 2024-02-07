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

        function generarMatriz($filas, $columnas) {
            for ($i = 0; $i < $filas; $i++) {
                $fila = array();
                for ($j = 0; $j < $columnas; $j++) {
                    $fila[] = rand(1, 10);
                }
                $matriz[] = $fila;
            }
            return $matriz;
        }

        function mostrarMatriz($matriz) {
            echo "<table border='1'>";
            foreach ($matriz as $fila) {
                echo "<tr>";
                foreach ($fila as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        function sumarFilas($matriz) {
            foreach ($matriz as $fila) {
                $suma[] = array_sum($fila);
            }
            return $suma;
        }

        function sumarColumnas($matriz) {
            for ($i = 0; $i < count($matriz[0]); $i++) {
                $suma[] = array_sum(array_column($matriz, $i));
            }
            return $suma;
        }

        function sumarFilasColumnas($matriz, &$sumaFilas) {
            foreach ($matriz as $fila) {
                $filas[] = array_sum($fila);
            }
            for ($i = 0; $i < count($matriz[0]); $i++) {
                $columnas[] = array_sum(array_column($matriz, $i));
            }
            $sumaFilas = array_sum($filas);
            return array_sum($columnas);
        }

        function sumarDiagonal($matriz) {
            $suma = 0;
            for ($i = 0; $i < count($matriz); $i++) {
                $suma += $matriz[$i][$i];
            }
            return $suma;
        }

        function matrizTraspuesta($matriz) {
            for ($i = 0; $i < count($matriz[0]); $i++) {
                for ($j = 0; $j < count($matriz); $j++) {
                    $matrizTraspuesta[$i][$j] = $matriz[$j][$i];
                }
            }
            return $matrizTraspuesta;
        }
        ?>
    </body>
</html>
