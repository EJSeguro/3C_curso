<?php

$salario = 1.320;
$quilowatts = (1/7 * $salario)/100;
$consumo = readline("Consumo: ");
$valorTotal = $quilowatts * $consumo;
echo "Real por Quilowatts: R$ $quilowatts";
echo "\nValor: R$ $valorTotal";
echo "\nValor com desconto: R$ " . $valorTotal - ($valorTotal*(10/100)) . "\n";