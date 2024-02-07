<?php
require_once "DadoPoker.php";

$d1 = new DadoPoker();
$d2 = new DadoPoker();
$d3 = new DadoPoker();
$d4 = new DadoPoker();
$d5 = new DadoPoker();

echo "Dado 1. " . $d1->nombreFigura($d1->tira());
echo "Dado 2. " . $d2->nombreFigura($d2->tira());
echo "Dado 3. " . $d3->nombreFigura($d3->tira());
echo "Dado 4. " . $d4->nombreFigura($d4->tira());
echo "Dado 5. " . $d5->nombreFigura($d5->tira());
echo "<br>Se han realizado " . DadoPoker::getTiradasTotales() . " tiradas.";