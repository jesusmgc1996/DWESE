<?php
require_once "../model/Usuario.php";
require_once "../controller/CitaController.php";
require_once "../controller/ItvController.php";
require_once "../controller/VehiculoController.php";
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
    echo "<h1>Gestión de citas de las ITV de " . $_SESSION['user']->provincia . "</h1>";
    ?>
    <form action="" method="post">
        Matrícula: <input type="text" name="matricula">
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <?php
    if (isset($_POST['buscar'])) {
        $v = VehiculoController::buscarVehiculo($_POST['matricula']);
        if ($v === false) {
            echo "Se ha producido un error en la base de datos";
        } elseif ($v) {
            $c = CitaController::buscarCita($_POST['matricula']);
            if ($c === false) {
                echo "Se ha producido un error en la base de datos";
            } elseif ($c) {
                $_SESSION['cita'] = $c;
                $i = ItvController::buscarItv($c->id_itv);
                if ($i === false) {
                    echo "Se ha producido un error en la base de datos";
                } elseif ($i) {
                    echo "Ya tiene una cita el día $c->fecha a las $c->hora en la ITV de $i->localidad en la provincia de $i->provincia";
                    ?>
                    <form action="" method="post">
                        <input type="submit" name="anular" value="Anular">
                    </form>
                    <?php
                }
            } else {
                $itvs = ItvController::mostrarPorProvincia($_SESSION['user']->provincia);
                if ($itvs === false) {
                    echo "Se ha producido un error en la base de datos";
                } elseif ($itvs) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <h2>Datos del vehículo</h2>
                        Matrícula: <input type="text" name="matricula" value="<?php echo $v->matricula; ?>" readonly><br>
                        Marca: <input type="text" name="marca" value="<?php echo $v->marca; ?>" readonly><br>
                        Modelo: <input type="text" name="modelo" value="<?php echo $v->modelo; ?>" readonly><br>
                        Color: <input type="text" name="color" value="<?php echo $v->color; ?>" readonly><br>
                        Plazas: <input type="text" name="plazas" value="<?php echo $v->plazas; ?>" readonly><br>
                        Fecha última revisión: <input type="text" name="fechaRevision" value="<?php echo $v->fecha; ?>" readonly><br>
                        Elegir ITV: <select name="itv">
                            <?php
                            foreach ($itvs as $i) {
                                echo "<option value='$i->id'>$i->localidad - $i->direccion</option>";
                            }
                            ?>
                        </select><br>
                        Fecha: <input type="date" name="fecha" required><br>
                        Hora: <input type="time" name="hora" required><br>
                        Ficha técnica del vehículo: <input type="file" name="ficha" required><br><br>
                        <input type="submit" name="registrar" value="Registrar cita">
                    </form>
                    <?php
                } else {
                    echo "No existen sedes de ITV para esta provincia";
                }
            }
        } else {
            echo "No existe ningún vehículo con esa matrícula";
        }
    }
    if (isset($_POST['anular'])) {
        $c = $_SESSION['cita'];
        $filas = CitaController::eliminarCita($c->matricula);
        if ($filas === false) {
            echo "Se ha producido un error en la base de datos<br><br>";
        } else {
            unlink($c->ficha);
            echo "CITA ANULADA";
        }
    }
    if (isset($_POST['registrar'])) {
        if ($_FILES['ficha']['type'] == "image/jpeg") {
            if (is_uploaded_file($_FILES['ficha']['tmp_name'])) {
                $fichero = time() . "-" . $_POST['matricula'] . "-ficha";
                $ruta = "../fichas/$fichero";
                move_uploaded_file($_FILES['ficha']['tmp_name'], $ruta);
                $c = new Cita($_POST['matricula'], $_POST['itv'], $_POST['fecha'], $_POST['hora'], $ruta);
                $_SESSION['cita'] = $c;
                $filas1 = VehiculoController::modificarVehiculo($_POST['fecha'], $_POST['matricula']);
                $filas2 = CitaController::insertarCita($c);
                if ($filas1 === false || $filas2 === false) {
                    echo "Se ha producido un error en la base de datos<br><br>";
                } else {
                    header("location: menu.php");
                }
            } else {
                echo "Se ha producido un error al subir el archivo";
            }
        } else {
            echo $_FILES['ficha']['type'];
            echo "El formato de la ficha no es correcto";
        }
    }
}