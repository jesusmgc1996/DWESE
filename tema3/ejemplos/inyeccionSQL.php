<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            Usuario: <input type="text" name="user"><br>
            Contraseña: <input type="text" name="pass"><br><br>
            <input type="submit" name="sql" value="SQL">
            <input type="submit" name="prep" value="Preparada">
        </form>

        <?php
        if (isset($_POST['sql'])) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
                $result = $conex->query("SELECT * FROM empleados WHERE Usuario = '$_POST[user]' AND Contraseña = '$_POST[pass]'");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }

            if ($result->num_rows > 0) {
                echo "<br>Has entrado";
            } else {
                echo "<br>Usuario o clave incorrecta";
            }
        }

        if (isset($_POST['prep'])) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
                $stmt = $conex->prepare("SELECT * FROM empleados WHERE Usuario = ? AND Contraseña = ?");
                $stmt->bind_param('ss', $_POST['user'], $_POST['pass']);
                $stmt->execute();
            } catch (Exception $ex) {
                die($ex->getMessage());
            }

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<br>Has entrado";
            } else {
                echo "<br>Usuario o clave incorrecta";
            }
            
            $conex->close();
        }
        ?>
    </body>
</html>
