<?php

$salario = 1000;
$comissãoPorVenda = 100;
$qtdVendas = readline("Declare quantas vendas foram realizadas: ");
$valorVenda = 0;
$valorTotalVendas = 0;


for($i = 0; $i < $qtdVendas; $i++){
    $valorVenda = readline("Declare o valor da venda " . $i+1 . ": ");
    $porcentagemVendas = $valorVenda*(5/100);
    $valorTotalVendas = $valorTotalVendas + $porcentagemVendas;
}

$salarioFinal = $salario + ($comissãoPorVenda * $qtdVendas) + $valorTotalVendas;


echo "\nSalário final: R$ $salarioFinal \n";
