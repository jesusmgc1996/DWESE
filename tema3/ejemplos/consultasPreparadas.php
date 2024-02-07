<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            //$stmt = $conex->prepare("INSERT INTO tienda (nombre, tlf) values (?, ?)");
            $stmt = $conex->prepare("SELECT nombre_corto, descripcion, PVP FROM producto WHERE PVP > ?");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }*/

        /*$tiendas = array(
            array("nombre" => "SUCURSAL3", "tlf" => 123456789),
            array("nombre" => "SUCURSAL4", "tlf" => 123456789),
            array("nombre" => "SUCURSAL5", "tlf" => 123456789),
            array("nombre" => "SUCURSAL6", "tlf" => 123456789)
        );

        foreach ($tiendas as $fila) {
            $stmt->bind_param('si', $fila['nombre'], $fila['tlf']);
            try {
                $stmt->execute();
                echo "Registro insertado";
            } catch (Exception $ex) {
                echo "ERROR";
            }
        }*/
        
        $precios = array(100, 200, 30, 400);
        
        /*foreach ($precios as $value) {
            $stmt->bind_param('i', $value);
            $stmt->execute();
            $stmt->bind_result($nombre, $descrip, $precio);
            while ($stmt->fetch()) {
                echo $nombre . " - " . $descrip . " - " . $precio . "<br>";
            }
        }*/
        
        /*foreach ($precios as $value) {
            $stmt->bind_param('i', $value);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($fila = $result->fetch_object()) {
                echo $fila->nombre_corto . " - " . $fila->descripcion . " - " . $fila->PVP . "<br>";
            }
        }*/
        
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        foreach ($precios as $value) {
            $result = $conex->query("SELECT nombre_corto, descripcion, PVP FROM producto WHERE PVP > $value");
            while ($fila = $result->fetch_object()) {
                echo $fila->nombre_corto . " - " . $fila->descripcion . " - " . $fila->PVP . "<br>";
            }
        }
        
        $conex->close();
        ?>
    </body>
</html>
