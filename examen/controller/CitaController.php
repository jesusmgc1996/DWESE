<?php
require_once "../model/Cita.php";
require_once "../controller/Conexion.php";

class CitaController {

    public static function buscarCita($matricula) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from citas where matricula = '$matricula'");
            if ($reg = $result->fetchObject()) {
                $c = new Cita($reg->matricula, $reg->id_itv, $reg->fecha, $reg->hora, $reg->ficha);
            } else {
                $c = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $c = false;
        }
        return $c;
    }
    
    public static function eliminarCita($matricula) {
        try {
            $conex = new Conexion();
            $filas = $conex->exec("delete from citas where matricula = '$matricula'");
        } catch (PDOException $e) {
            echo $e->getMessage();
            $filas = false;
        }
        return $filas;
    }
    
    public static function insertarCita($c) {
        try {
            $conex = new Conexion();
            $filas = $conex->exec("insert into citas values ('$c->matricula', $c->id_itv, '$c->fecha', '$c->hora', '$c->ficha')");
        } catch (PDOException $e) {
            echo $e->getMessage();
            $filas = false;
        }
        return $filas;
    }
    
    public static function mostrarPorItv($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from citas where id_itv = $id");
            if ($result->rowCount()) {
                while ($reg = $result->fetchObject()) {
                    $c = new Cita($reg->matricula, $reg->id_itv, $reg->fecha, $reg->hora, $reg->ficha);
                    $citas[] = $c;
                }
            } else {
                $citas = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $citas = false;
        }
        return $citas;
    }
}