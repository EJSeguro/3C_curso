<?php
require_once "Animal.php";
require_once "Humano.php";
// require_once "Funcionario";

$humanos = [];
$animais = [];
$produtos = [];
$vendas = [];

function opcaoInvalida()
{
    readline("\nOpção inválida! Pressione ENTER para continuar . . .");
}

function voltarMenu()
{
    readline("\nVoltando ao menu! Pressione ENTER para continuar!");
}

function findObject($array, $getter, $value)
{
    foreach ($array as $element) {
        if ($element->$getter() == $value) {
            return $element;
        }
    }

    return null;
}


function cadastrarCliente()
{
    global $humanos;
    echo "========Cadastrar Cliente========\n";
    $cpf = readline("Informe o cpf: ");
    $verifyCpf = findObject($humanos, 'getCpf', $cpf);
    if ($verifyCpf == NULL) {
        $nome = readline("Informe o nome: ");
        $idade = readline("Informe a idade: ");
        $endereco = readline("Informe o endereço: ");
        $contato = readline("Informe o contato: ");
        $humano = new Humano($nome, $cpf, $idade, $endereco, $contato);
        $humanos[] = $humano;
        echo "Cliente cadastrado com sucesso!\n";
        voltarMenu();
    } else {
        echo "Cpf já cadastrado!\n";
        voltarMenu();
    }
}

function verificarCliente()
{
    global $humanos;
    $cpf = readline("Informe o cpf do cliente: ");
    $cliente = findObject($humanos, 'getCpf', $cpf);
    if ($cliente == NULL) {
        echo "Cliente não encotrado!\n";
        voltarMenu();
    } else {
        echo $cliente;
        voltarMenu();
    }
}

function menuClientes()
{
    echo "========Clientes========\n";
    echo "1-Cadastrar\n2-Verificar\nENTER - Voltar ao menu\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            cadastrarCliente();
            break;
        case 2:
            verificarCliente();
            break;
        default:
            voltarMenu();
            break;
    };
}

function cadastrarAnimais()
{
    global $animais;
    global $humanos;
    echo "========Cadastrar Animais========\n";
    $cpf = readline("Informe o cpf do dono: ");
    $verifyCpf = findObject($humanos, 'getCpf', $cpf);
    if ($verifyCpf == NULL) {
        echo "\nDono ainda não cadastrado!\nDeseja realizar cadastro? 1-Sim 2-Não\n";
        $escolha = readline("Digite aqui: ");
        if($escolha == 1){
            cadastrarCliente();
        }
        else{
            voltarMenu();
        }
    } else {
        $name = readline("Informe o nome do PET: ");
        $raca = readline("Informe a raça do PET: ");
        $qtdPatas = readline("Informe a quantidade de patas do PET: ");
        $color = readline("Informe a cor do PET: ");
        $peso = readline("Informe o peso do PET: ");
        $tamanho = readline("Informe o tamanho do PET: ");
        echo "\nSeu animal é um : 1-Cachorro 2-Gato 3-Ornitorrinco\n";
        $animalTipo = readline("Digite aqui: ");
        switch($animalTipo){
            case 1:
                $animal = new Cachorro($name, $raca, $qtdPatas, $color, $peso, $tamanho, $verifyCpf);
                break;
            case 2:
                $animal = new Gato($name, $raca, $qtdPatas, $color, $peso, $tamanho, $verifyCpf);
                break;
            case 3:
                $animal = new Ornitorrinco($name, $raca, $qtdPatas, $color, $peso, $tamanho, $verifyCpf);
                break;
            default:
                opcaoInvalida();
                break;
        }
        $animais[] = $animal;
        echo "\nAnimal cadastrado com sucesso!\n";
        voltarMenu();
    }
}

function verificarAnimais(){
    global $animais;
    global $humanos;

    $cpf = readline("Informe o cpf do dono: ");
    $verifyCpf = findObject($humanos, 'getCpf', $cpf);
    $animal = findObject($animais, 'getHumano', $verifyCpf);
    if($animal == NULL){
        echo "\nNenhum animal cadastrado!\n";
        voltarMenu();
    }
    else{
        $animal->descricaoAnimal();
    }
    
}

function menuAnimais()
{
    echo "========Animais========\n";
    echo "1-Cadastrar\n2-Verificar\nENTER - Voltar\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            cadastrarAnimais();
            break;
        case 2:
            verificarAnimais();
            break;
        default:
            voltarMenu();
            break;
    };
}

function menuProdutos()
{
    system('clear');
    echo "========Produtos========\n";
    echo "1-Cadastrar\n2-Verificar\n3-Editar\n4-Remover\nENTER - Voltar\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            cadastrarProduto();
            break;
        case 2:
            verificarVerificar();
            break;
        case 3:
            editarProduto();
            break;
        case 4:
            removerProduto();
            break;
        default:
            voltarMenu();
            break;
    };
}

function menuFuncionarios() {}

while (true) {
    echo "========Clínica Veterinária========\n";
    echo "1-Clientes\n2-Animais\n3-Produtos\n4-Funcionários\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            menuClientes();
            break;
        case 2:
            menuAnimais();
            break;
        case 3:
            menuProdutos();
            break;
        case 4:
            menuFuncionarios();
            break;
        default:
            opcaoInvalida();
            break;
    };
}

$cpf = readline("digite o cpf do cria");
$cria = findObject($humanos, 'getCpf', $cpf);
var_dump($cria);
