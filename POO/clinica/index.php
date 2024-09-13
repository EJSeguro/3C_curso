<?php
    require_once "Animal.php";
    require_once "Humano.php";
    require_once "Funcionario";
    

    $produtos = [];
    $vendas = [];
    while(true){
        
    }
    $humano = new Humano($nome, $idade, $endereco, $contato);
    $funcionario = new Funcionario($humano, $cargo, $salario);
    $animal = new Animal($nome, $raca, $qtdPatas, $cor, $peso, $tamanho, $humano);


    



    