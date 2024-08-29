<?php

$produto = readline("Declare o valor do produto para realizar o reajuste: ");
$valorFinal = $produto + ($produto*(1/100));

echo "\nValor final: R$" . $valorFinal . "\n";