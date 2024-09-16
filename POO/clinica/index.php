<?php

require_once "Animal.php";
require_once "Humano.php";
require_once "Funcionario.php";

$produtos = [];
$vendas = [];
function voltandoMenu()
{
    echo "Voltando ao menu!\n";
    readline("Pressione ENTER para continaur ...");
}

function opcaoInvalida()
{
    echo "Opção inválida, voltando ao menu!\n";
    readline("Pressione ENTER para continaur ...");
}



while (true) {
    echo "\n========Clínica Veterinária========\n1-Clientes\n2-Animais\n2-Funcionários\n3-Produtos\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            
            break;
        case 2:
            
            break;
        case 3:
            break;
        case 4:
            break;
        default:
            echo "Opção inválida!\n";
            readline("Pressione ENTER para tentar novamente ...");
            break;
    }
}


