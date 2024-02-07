<?php
session_start();
if (isset($_SESSION['nombre'])) {
    echo "$_SESSION[nombre]<br><br>";
}
$_SESSION['nombre'] = "Antonio";
$_SESSION['apellidos'] = "Pérez";
?>
<a href="sesion2.php">Siguiente</a>