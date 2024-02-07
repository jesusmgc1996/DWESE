<?php
require_once "Conexion.php";

class Producto {
    private $cod;
    private $nombre;
    private $precio;

    public function __construct($cod = 0, $nombre = "", $precio = 0) {
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function modificarProducto($cod, $nombre, $precio) {
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __toString() {
        return "Código: $this->cod - Nombre: $this->nombre - Precio: $this->precio<br>";
    }

    public function insertarProducto() {
        try {
            $conex = new Conexion();
            $conex->query("insert into productos values ($this->cod, '$this->nombre', $this->precio)");
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
                $p = new self($reg->codigo, $reg->nombre, $reg->precio);
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
                    $p = new self($reg->codigo, $reg->nombre, $reg->precio);
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