<?php
session_start();
$reg = $_SESSION['sesion'];
?>
<style>
    body {
        color:
            <?php echo "$reg->color_letra" ?>
        ;
        background-color:
            <?php echo "$reg->color_fondo" ?>
        ;
        font-family:
            <?php echo "$reg->tipo_letra"; ?>
        ;
        font-size:
            <?php echo "$reg->tam_letra" ?>
        ;
    }
</style>

<a href="cerrar.php">Salir</a><br><br>

<body>
    Hola
    <?php echo "$reg->nombre $reg->apellidos" ?>
    <h1>Bienvenido a nuestra web</h1>
</body>

<a href="datos.php">Ver mis datos</a><br><br>
<a href="modificar.php">Modificar mis datos</a>