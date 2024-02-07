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
    <?php echo "$reg->nombre $reg->apellidos" ?><br><br>
    Tus datos son:<br><br>
    Nombre: <?php echo "$reg->nombre" ?><br>
    Apellidos: <?php echo "$reg->apellidos" ?><br>
    Dirección: <?php echo "$reg->direccion" ?><br>
    Localidad: <?php echo "$reg->localidad" ?><br>
    Usuario: <?php echo "$reg->user" ?><br>
    Color de letra: <?php echo "$reg->color_letra" ?><br>
    Color de fondo: <?php echo "$reg->color_fondo" ?><br>
    Tipo de letra: <?php echo "$reg->tipo_letra" ?><br>
    Tamaño de letra: <?php echo "$reg->tam_letra" ?><br><br>
</body>

<a href="inicio.php">Volver</a>