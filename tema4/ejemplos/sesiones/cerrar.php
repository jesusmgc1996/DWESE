<?php
session_start();
session_unset();
session_destroy();
setcookie("PHPSESSID", "", time() - 100, "/");
?>
<a href="sesion.php">Inicio</a>