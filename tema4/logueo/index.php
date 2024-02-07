<?php
session_start();
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 3;
}
try {
    $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conex = new PDO('mysql: host=localhost; dbname=logueo; charset=utf8mb4', 'dwes', 'abc123.', $opt);
    if (isset($_POST['entrar'])) {
        if ($_SESSION['intentos'] > 0) {
            $pass = md5($_POST['pass']);
            $result = $conex->query("select * from usuario where user = '$_POST[user]' and pass = '$pass'");
            if ($result->rowCount() > 0) {
                $_SESSION['sesion'] = $result->fetchObject();
                unset($_SESSION['intentos']);
            } else {
                $_SESSION['intentos']--;
                echo "<span style='color:red'>Usuario o contraseña incorrectos. Te quedan $_SESSION[intentos] intentos</span>";
            }
        }
    }
} catch (PDOException $ex) {
    die($ex->getMessage());
}
if (isset($_SESSION['sesion'])) {
    header("location: inicio.php");
} elseif ($_SESSION['intentos'] == 0) {
    header("location: intentos.php");
}
?>
<h1>FORMULARIO DE REGISTRO</h1>
<form action="" method="post">
    Usuario: <input type="text" name="user"><br>
    Contraseña: <input type="password" name="pass"><br><br>
    <input type="submit" name="entrar" value="Entrar">
</form>
<form action="registro.php" method="post">
    <input type="submit" name="registro" value="Registro">
</form>