<?php
session_start();
if (isset($_SESSION['nombre'])) {
    echo "$_SESSION[nombre]<br><br>";
}
$_SESSION['nombre'] = "Pepe";
?>
<a href="sesion.php">Volver</a><br><br>
<a href="cerrar.php">Cerrar sesión</a>