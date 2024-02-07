<?php
function validarNombre($nombre) {
    if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
        return true;
    }
}

function validarDni($dni) {
    if (!preg_match('/^\d{8}[A-Z]$/', $dni)) {
        return true;
    }
}

function validarGoles($goles) {
    if (!preg_match('/^\d+$/', $goles)) {
        return true;
    }
}
?>