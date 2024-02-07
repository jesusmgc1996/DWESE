<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre"><br>
            Apellidos: <input type="text" name="apell"><br>
            Salario: <input type="text" name="sal"><br>
            Idiomas:<br>
            <input type="checkbox" name="idiomas[]" value="1">Español<br>
            <input type="checkbox" name="idiomas[]" value="2">Inglés<br>
            <input type="checkbox" name="idiomas[]" value="4">Alemán<br>
            <input type="checkbox" name="idiomas[]" value="8">Chino<br>
            <input type="checkbox" name="idiomas[]" value="16">Francés<br>
            Estudios: <select multiple="" name="estudios[]">
                <option value="ESO">ESO</option><br>
                <option value="Bachillerato">Bachillerato</option><br>
                <option value="CFGM">CFGM</option><br>
                <option value="CFGS">CFGS</option><br>
            </select><br>
            Usuario: <input type="text" name="user"><br>
            Contraseña: <input type="text" name="pass"><br><br>
            <input type="submit" name="guardar" value="Guardar">
            <input type="submit" name="recuperar" value="Recuperar">
        </form>
        <?php
        if (isset($_POST['guardar'])) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
                $conex->set_charset('utf8mb4');
                $idiomas = 0;
                foreach ($_POST['idiomas'] as $value)
                    $idiomas += $value;
                $estudios = implode("-", $_POST['estudios']);
                $conex->query("INSERT INTO empleados VALUES ('', '$_POST[nombre]', '$_POST[apell]', $_POST[sal], $idiomas, '$estudios', '$_POST[user]', '$_POST[pass]')");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            echo "<br>Registro insertado correctamente";
            $conex->close();
        }
        if (isset($_POST['recuperar'])) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
                $conex->set_charset('utf8mb4');
                $result = $conex->query("SELECT * FROM empleados WHERE Codigo = 0");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($result->num_rows > 0) {
                $reg = $result->fetch_object();
                echo "Nombre: " . $reg->Nombre . "<br>";
                echo "Apellidos: " . $reg->Apellidos . "<br>";
                echo "Idiomas: " . $reg->Idiomas . "<br>";
                echo "Estudios: " . $reg->Estudios . "<br>";
            } else {
                "No se han podido recuperar los datos";
            }
            $conex->close();
        }
        ?>
    </body>
</html>