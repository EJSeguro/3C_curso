<?php

$base = readline("Declare a base do retângulo: ");
$altura = readline("Declare a altura do retângulo: ");
$perimetro = 2*($altura+$base);
$diagonal = sqrt($altura**2+$base**2);
$area = $altura*$base;

echo "Perímetro: $perimetro \n";
echo "Diagonal: $diagonal \n";
echo "Área: $area\n";
