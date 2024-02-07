<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        } catch (Exception $ex) {
            die($ex->getMessage());
        }

        try {
            $result = $conex->query("SELECT * FROM producto");
            while ($fila = $result->fetch_object()) {
                echo "$fila->cod - $fila->nombre_corto<br>";
            }
            $result->data_seek(0);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        $conex->close();
        ?>
    </body>
</html>