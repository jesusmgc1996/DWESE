<?php
require_once "../controller/UsuarioController.php";
session_start();
?>

<form action="" method="post">
    <h1>Gestión de citas ITV Andalucía</h1>
    Usuario: <input type="text" name="user"><br>
    Clave: <input type="password" name="clave"><br><br>
    <input type="submit" name="acceder" value="Acceder">
</form

<?php
try {
    if (isset($_POST['acceder'])) {
        $u = UsuarioController::buscarUsuario($_POST['user']);
        if ($u === false) {
            echo "Se ha producido un error en la base de datos";
        } elseif ($u && password_verify($_POST['clave'], $u->pass)) {
            $_SESSION['user'] = $u;
            header("location: menu.php");
        } else {
            echo "<span style='color:red'>Usuario o clave incorrectos</span>";
        }
    }
} catch (PDOException $ex) {
    die($ex->getMessage());
}
?>