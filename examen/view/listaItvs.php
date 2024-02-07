<?php
require_once "../model/Usuario.php";
require_once "../controller/ItvController.php";
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
    echo "<h1>Sedes de ITV de la provincia de " . $_SESSION['user']->provincia . "</h1>";
    $itvs = ItvController::mostrarPorProvincia($_SESSION['user']->provincia);
    if ($itvs === false) {
        echo "Se ha producido un error en la base de datos";
    } elseif ($itvs) {
        echo "<table border=1><tr><td>Localidad</td><td>Dirección</td><td>Citas</td></tr>";
        foreach ($itvs as $i) {
            echo "<tr>";
            echo "<td>$i->localidad</td>";
            echo "<td>$i->direccion</td>";
            ?>
            <td>
                <form action="citas.php" method="post">
                    <input type="submit" name="citas" value="Mis citas">
                    <input type="hidden" name="localidad" value="<?php echo $i->localidad; ?>">
                </form>
            </td>
            <?php
            echo "</tr>";
        }
    } else {
        echo "No existen sedes de ITV para esta provincia";
    }
}