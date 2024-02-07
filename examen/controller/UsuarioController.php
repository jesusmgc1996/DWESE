<?php
require_once "../model/Usuario.php";
require_once "../controller/Conexion.php";

class UsuarioController {

    public static function buscarUsuario($user) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from usuario where user = '$user'");
            if ($reg = $result->fetchObject()) {
                $u = new Usuario($reg->provincia, $reg->nombre, $reg->telefono, $reg->user, $reg->pass);
            } else {
                $u = 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $u = false;
        }
        return $u;
    }
}