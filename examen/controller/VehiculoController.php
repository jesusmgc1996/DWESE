<?php
require_once "../model/Vehiculo.php";
require_once "../controller/Conexion.php";

class VehiculoController {
    
    public static function buscarVehiculo($matricula) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from vehiculo where matricula = '$matricula'");
            if ($reg = $result->fetchObject()) {
                $v = new Vehiculo($reg->matricula, $reg->marca, $reg->modelo, $reg->color, $reg->plazas, $reg->fecha_ultima_revision);
            } else {
                $v = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $v = false;
        }
        return $v;
    }
    
    public static function modificarVehiculo($fecha, $matricula) {
        try {
            $conex = new Conexion();
            $filas = $conex->exec("update vehiculo set fecha_ultima_revision = '$fecha' where matricula = '$matricula'");
        } catch (PDOException $e) {
            echo $e->getMessage();
            $filas = false;
        }
        return $filas;
    }
}
