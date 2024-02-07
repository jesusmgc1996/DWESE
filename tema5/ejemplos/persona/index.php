<?php
require_once "Empleado.php";

$p = new Persona();

echo "Número de personas: " . Persona::getNumPerson() . "<br>";

$p1 = new Persona("Pepe", "Sánchez", 55);

echo "Número de personas: " . Persona::getNumPerson() . "<br>";

unset($p);

echo "Número de personas: " . Persona::getNumPerson() . "<br>";
echo "<hr>";
echo $p1->nombre . " " . $p1->apellidos . " " . $p1->edad . "<br>";

$p2 = clone($p1);
$p2->nombre = "Juan";

echo "$p1<br>";
echo "$p2<br>";
echo "Número de personas: " . Persona::getNumPerson() . "<br>";
echo "<hr>";

$p1->modificar("Rosa");

echo "$p1<br>";

$p1->modificar("Rosa", "Cantero");

echo "$p1<br>";

$p1->modificar("Rosa", "Cantero", 50);

echo "$p1<br>";
echo "<br>**********HERENCIA**********<br><br>";

$e = new Empleado("Pepe", "Sánchez", 55, 1500);

echo "$e<br>";