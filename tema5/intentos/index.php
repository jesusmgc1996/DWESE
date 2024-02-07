<?php
try {
    $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conex = new PDO('mysql: host=localhost; dbname=intentos; charset=utf8mb4', 'dwes', 'abc123.', $opt);
    if (isset($_POST['acceder'])) {
        $result = $conex->query("select * from profesores where dni_p = '$_POST[dni]'");
        $pass = md5($_POST['pass']);
        if ($reg = $result->fetchObject()) {
            if ($reg->bloqueado == 0) {
                if ($pass == $reg->pass) {
                    $conex->exec("update profesores set intentos = 3 where dni_p = '$_POST[dni]'");
                    header("location: acceso.php");
                } else {
                    $errorPass = true;
                }
            } elseif (time() >= $reg->hora_bloqueo + 60) {
                $conex->exec("update profesores set bloqueado = 0, hora_bloqueo = 0 where dni_p = '$_POST[dni]'");
                if ($pass == $reg->pass) {
                    header("location: acceso.php");
                } else {
                    $errorPass = true;
                }
            } else {
                $errorIntentos = true;
            }
        } else {
            $errorUser = true;
        }
    }
    if (isset($errorPass)) {
        $intentos = $reg->intentos - 1;
        if ($intentos > 0) {
            $conex->exec("update profesores set intentos = $intentos where dni_p = '$_POST[dni]'");
        } else {
            $errorIntentos = true;
            $hora = time();
            $conex->exec("update profesores set bloqueado = 1, hora_bloqueo = $hora, intentos = 3 where dni_p = '$_POST[dni]'");
        }
    }
} catch (PDOException $ex) {
    die($ex->getMessage());
}
?>
<h1>Formulario de acceso</h1>
<?php
if (isset($errorUser)) {
    echo "<span style='color:red'>Usuario incorrecto</span><br><br>";
}
if (isset($errorPass)) {
    echo "<span style='color:red'>Clave incorrecta</span><br>";
    if (!isset($errorIntentos)) {
        echo "<span style='color:red'>Le quedan $intentos intentos</span><br><br>";
    }
}
if (isset($errorIntentos)) {
    echo "<span style='color:red; font-weight: bold'>USUARIO BLOQUEADO 1 MINUTO</span><br><br>";
}
?>
<form action="" method="post">
    DNI: <input type="text" name="dni" value="<?php if (isset($errorPass) || isset($errorIntentos)) echo $_POST['dni']; ?>"><br>
    Contraseña: <input type="password" name="pass"><br><br>
    <input type="submit" name="acceder" value="Acceder">
</form>