<?php
require_once "../model/Usuario.php";
require_once "../model/Cita.php";
require_once "../controller/ItvController.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("location: index.php");
} else {
    echo "Hola Administrador de " . $_SESSION['user']->provincia;
    echo "<br>Teléfono: " . $_SESSION['user']->telefono;
    ?>
    <br><a href="cerrar.php">Cerrar sesión</a><br>
    <?php
    echo "<h1>Gestión de citas de las ITV de " . $_SESSION['user']->provincia . "</h1>";
    ?>
    <a href="nuevaCita.php">Registrar nueva cita</a><br>
    <a href="listaItvs.php">Listado de sedes de ITV</a>
    <?php
    if (isset($_SESSION['cita'])) {
        $i = ItvController::buscarItv($_SESSION['cita']->id_itv);
        if ($i === false) {
            echo "Se ha producido un error en la base de datos";
        } elseif ($i) {
            echo "El vehículo con matrícula " . $_SESSION['cita']->matricula . " tiene una cita el día " . $_SESSION['cita']->fecha . " a las " . $_SESSION['cita']->hora
            . " en la sede de " . $i->localidad . " en la provincia de " . $i->provincia;
        }
    }
}