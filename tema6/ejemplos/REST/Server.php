<?php

$conex = new PDO('mysql: host=localhost; dbname=dwes; charset=utf8mb4', 'dwes', 'abc123.');
if (isset($_GET['precio'])) {
    $result = $conex->query("SELECT * FROM producto WHERE PVP > $_GET[precio]");
} else {
    $result = $conex->query("SELECT * FROM producto");
}
$i = 0;
while ($reg = $result->fetchObject()) {
    $datos[$i]['codigo'] = $reg->cod;
    $datos[$i]['nombre'] = $reg->nombre_corto;
    $datos[$i]['pvp'] = $reg->PVP;
    $i++;
}
echo json_encode($datos);