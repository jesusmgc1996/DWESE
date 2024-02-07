<?php
session_start();
session_unset();
session_destroy();
setcookie("PHPSESSID", "", time() - 100, "/");
header("location: index.php");
?>