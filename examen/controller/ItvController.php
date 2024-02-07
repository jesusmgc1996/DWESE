<?php
require_once "../model/Itv.php";
require_once "../controller/Conexion.php";

class ItvController {

    public static function mostrarPorProvincia($provincia) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from itvs where provincia = '$provincia'");
            if ($result->rowCount()) {
                while ($reg = $result->fetchObject()) {
                    $i = new Itv($reg->id, $reg->provincia, $reg->localidad, $reg->direccion, $reg->telefono);
                    $itvs[] = $i;
                }
            } else {
                $itvs = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $itvs = false;
        }
        return $itvs;
    }

    public static function buscarItv($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from itvs where id = $id");
            if ($reg = $result->fetchObject()) {
                $i = new Itv($reg->id, $reg->provincia, $reg->localidad, $reg->direccion, $reg->telefono);
            } else {
                $i = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $i = false;
        }
        return $i;
    }

    public static function buscarItvPorLocalidad($localidad) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from itvs where localidad = '$localidad'");
            if ($reg = $result->fetchObject()) {
                $i = new Itv($reg->id, $reg->provincia, $reg->localidad, $reg->direccion, $reg->telefono);
            } else {
                $i = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $i = false;
        }
        return $i;
    }
}
