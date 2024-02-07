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
        for ($i = 0; $i < 4; $i++) {
            $a[] = rand();
            $b[] = rand();
        }
        print_r($a);
        echo "<br>";
        print_r($b);

        $c = array_merge($a, $b);
        echo "<br>";
        print_r($c);

        foreach ($b as $valor) {
            $a[] = $valor;
        }
        echo "<br>";
        print_r($a);

        sort($c);
        echo "<br>";
        print_r($c);

        $n = count($a);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($a[$j] > $a[$j + 1]) {
                    $num = $a[$j];
                    $a[$j] = $a[$j + 1];
                    $a[$j + 1] = $num;
                }
            }
        }
        echo "<br>";
        print_r($a);
        ?>
    </body>
</html>
