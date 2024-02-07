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
        <form action="" method="POST">
            Introduzca el número de filas: <input type="text" name="filas"><br><br>
            Introduzca el número de columnas: <input type="text" name="columnas"><br><br>
            <input type="submit" name="calcular" value="Calcular"><br><br>
            <input type="hidden" name="op" value="<?php echo $_GET['op']; ?>">
            <?php
            require_once 'funciones.php';
            if (isset($_GET['op'])) {
                if (isset($_POST['calcular'])) {
                    $matriz = generarMatriz($_POST['filas'], $_POST['columnas']);
                    mostrarMatriz($matriz);
                    switch ($_POST['op']) {
                        case 1:
                            $suma = sumarFilas($matriz);
                            foreach ($suma as $ind => $valor) {
                                echo "<br>La suma de la fila " . ($ind + 1) . " es: " . $valor;
                            }
                            break;
                        case 2:
                            $suma = sumarColumnas($matriz);
                            foreach ($suma as $ind => $valor) {
                                echo "<br>La suma de la columna " . ($ind + 1) . " es: " . $valor;
                            }
                            break;
                        case 3:
                            echo "<br>La suma de las columnas es: " . sumarFilasColumnas($matriz, $sumaFilas);
                            echo "<br>La suma de las filas es: " . $sumaFilas;
                            break;
                        case 4:
                            if ($_POST['filas'] == $_POST['columnas']) {
                                echo "<br>La suma de la diagonal principal es: " . sumarDiagonal($matriz);
                            } else {
                                echo "<br>La matriz no es cuadrada. No se puede calcular la diagonal principal.";
                            }
                            break;
                        case 5:
                            echo "<br>";
                            mostrarMatriz(matrizTraspuesta($matriz));
                            break;
                    }
                    echo "<br><br><a href='index.html'>Volver</a>";
                }
            } else {
                header("Location: index.html");
            }
            ?>
        </form>
    </body>
</html>
