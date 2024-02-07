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

        $conex->set_charset('utf8mb4');
        $conex->autocommit(false);

        try {
            $conex->query("UPDATE stock SET unidades = unidades - 1 WHERE producto = '3DSNG' AND tienda = 1");
            $conex->query("INSERT INTO stock VALUES ('3DSNG', 3, 1)");
            $conex->commit();
            echo "Se ha ejecutado correctamente.";
        } catch (Exception $ex) {
            $conex->rollback();
            echo "Se ha producido un error.";
        }

        $conex->close();
        ?>
    </body>
</html>
