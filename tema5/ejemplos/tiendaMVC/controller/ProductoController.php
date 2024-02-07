<?php
require_once "../model/Producto.php";
require_once "../controller/Conexion.php";

class ProductoController {
    public static function insertarProducto($p) {
        try {
            $conex = new Conexion();
            $conex->query("insert into productos values ($p->cod, '$p->nombre', $p->precio)");
            $filas = $conex->affected_rows;
            $conex->close();
        } catch (Exception $e) {
            echo $e->getMessage();
            $filas = false;
        }
        return $filas;
    }

    public static function buscarProducto($cod) {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from productos where codigo = $cod");
            if ($reg = $result->fetch_object()) {
                $p = new Producto($reg->codigo, $reg->nombre, $reg->precio);
            } else {
                $p = 0;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            $p = false;
        }
        return $p;
    }

    public static function mostrarTodos() {
        try {
            $conex = new Conexion();
            $result = $conex->query("select * from productos");
            if ($result->num_rows) {
                while ($reg = $result->fetch_object()) {
                    $p = new Producto($reg->codigo, $reg->nombre, $reg->precio);
                    $productos[] = $p;
                }
            } else {
                $productos = 0;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            $productos = false;
        }
        return $productos;
    }
}