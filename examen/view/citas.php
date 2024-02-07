<?php
require_once "../model/Usuario.php";
require_once "../controller/VehiculoController.php";
require_once "../controller/ItvController.php";
require_once "../controller/CitaController.php";
session_start();

if (!isset($_SESSION['user'])) {
    header("location: index.php");
} else {
    echo "Hola Administrador de " . $_SESSION['user']->provincia;
    echo "<br>Teléfono: " . $_SESSION['user']->telefono;
    ?>
    <br><a href="cerrar.php">Cerrar sesión</a><br>
    <a href="menu.php">Volver al menú</a><br>
    <?php
    echo "<h1>Vehículos con cita en la ITV de " . $_POST['localidad'] . "</h1>";
    $i = ItvController::buscarItvPorLocalidad($_POST['localidad']);
    $citas = CitaController::mostrarPorItv($i->id);
    if ($citas === false) {
        echo "Se ha producido un error en la base de datos";
    } elseif ($citas) {
        echo "<table border=1><tr><td>Matrícula</td><td>Marca</td><td>Modelo</td><td>Fecha</td><td>Hora</td><td>Ficha técnica</td></tr>";
        foreach ($citas as $c) {
            $v = VehiculoController::buscarVehiculo($c->matricula);
            echo "<tr>";
            echo "<td>$v->matricula</td>";
            echo "<td>$v->marca</td>";
            echo "<td>$v->modelo</td>";
            echo "<td>$c->fecha</td>";
            echo "<td>$c->hora</td>";
            echo "<td><a href='ficha.php?ruta=$c->ficha'>Ver mi ficha</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No existen citas para esta sede";
    }
}