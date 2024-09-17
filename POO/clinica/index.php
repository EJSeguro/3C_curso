<?php
require_once "Animal.php";
require_once "Humano.php";
require_once "Produtos.php";
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
    system('clear');
    echo "========Cadastrar Cliente========\n";
    $cpf = readline("Informe o cpf: ");
    $verifyCpf = findObject($humanos, 'getCpf', $cpf);
    if ($verifyCpf == NULL) {
        $nome = readline("Informe o nome: ");
        $idade = readline("Informe a idade: ");
        $endereco = readline("Informe o endereço: ");
        $contato = readline("Informe o contato: ");
        $compra = '';
        $humano = new Humano($nome, $cpf, $idade, $endereco, $contato, $compra);
        $humanos[] = $humano;
        system('clear');
        echo "Cliente cadastrado com sucesso!\n";
        voltarMenu();
    } else {
        system('clear');
        echo "Cpf já cadastrado!\n";
        voltarMenu();
    }
}

function verificarCliente()
{
    global $humanos;
    system('clear');
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
    system('clear');
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
    system('clear');
    echo "========Cadastrar Animais========\n";
    $cpf = readline("Informe o cpf do dono: ");
    $verifyCpf = findObject($humanos, 'getCpf', $cpf);
    if ($verifyCpf == NULL) {
        echo "\nDono ainda não cadastrado!\nDeseja realizar seu cadastro? 1-Sim 2-Não\n";
        $escolha = readline("Digite aqui: ");
        if($escolha == 1){
            cadastrarCliente();
        }
        else{
            voltarMenu();
        }
    } else {
        system('clear');
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
    system('clear');
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
    system('clear');
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

function cadastrarProdutos(){
    global $produtos;
    system('clear');
    $newId = end($produtos);
    $newId = $newId ? $newId->getId() + 1 : 1;
    $produto = readline("Informe o nome do produto: ");
    $preco = readline("Informe o valor do produto: ");
    $qtd = readline("Informe a quantidade de estoque: ");
    $produto = new Produtos($newId, $produto, $preco, $qtd);
    $produtos[] = $produto;
    echo "\nProduto cadastrado com sucesso!\n";
    voltarMenu();
}

function verificarProdutos(){
    global $produtos;
    system('clear');
    foreach($produtos as $produto){
        echo $produto;
    }
    voltarMenu();
}

function editarProdutos(){
    global $produtos;
    system('clear');
    foreach($produtos as $produto){
        echo $produto;
    }
    $id = readline("Informe o ID do produto que deseja editar: ");
    $verifyId = findObject($produtos, 'getId', $id);
    if($verifyId == NULL){
        echo "ID não encontrado!\n";
        voltarMenu();
    }
    else{
    echo "1-Nome\n2-Preço\n3-Estoque\nENTER - Voltar\n";
    $escolha = readline("Digite aqui: ");
    switch($escolha){
        case 1:
            $nome = readline("Informe o novo nome: ");
            $verifyId->setProduto($nome);
            break;
        case 2:
            $preco = readline("Informe o novo preço: ");
            $verifyId->setPreco($preco);
            break;
        case 3:
            $qtd = readline("Informe a nova quantidade: ");
            $verifyId->setQTD($qtd);
            break;
        default:
            opcaoInvalida();
            break;
    }
    echo "Alterações feitas com sucesso!\n";
    voltarMenu();
}
}

function removerProdutos(){
    global $produtos;
    system('clear');
    foreach($produtos as $produto){
        echo $produto;
    }
    $id = readline("Informe o ID do produto que deseja remover: ");
    $verifyId = findObject($produtos, 'getId', $id);
    if($verifyId == NULL){
        echo "ID não encontrado!\n";
        voltarMenu();
    }
    else{
        echo "Tem certeza que deseja excluir o ID $id? 1-Sim 2-Não\n";
        $escolha = readline("Digite aqui: ");
        if($escolha == 1){
            $verifyObjeto = array_search($verifyId, $produtos);
            unset($produtos[$verifyObjeto]);
            echo "ID deletado com sucesso!\n";
            voltarMenu();

        }
        else{
            voltarMenu();
        }

    }
}

function menuProdutos()
{
    system('clear');
    echo "========Produtos========\n";
    echo "1-Cadastrar\n2-Verificar\n3-Editar\n4-Remover\nENTER - Voltar\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            cadastrarProdutos();
            break;
        case 2:
            verificarProdutos();
            break;
        case 3:
            editarProdutos();
            break;
        case 4:
            removerProdutos();
            break;
        default:
            voltarMenu();
            break;
    };
}

function venda(){
    global $humanos;
    global $produtos;
    global $vendas;
    system('clear');
    echo "========Vender========\n";
    echo "1-Vender\nENTER - Voltar\n";
    $escolha = readline("Digite aqui: ");
    if($escolha == 1){
        $cpf = readline("Informe o cpf do cliente: ");
        $verifyCpf = findObject($humanos, 'getCpf', $cpf);
        if($verifyCpf == NULL){
            echo "Cliente não registrado!\n";
            voltarMenu();
        }
    }
    else{
        $carrinho = true;
        while($carrinho == true){
            system('clear');
            foreach($produtos as $produto){
                echo $produto;
            }
            $escolha = readline("1-Adicionar produto 2-Voltar \nDigite aqui:");
            if($escolha == 1){
                $id = readline("Digite o id do produto desejado: ");
                $verifyId = findObject($produtos, 'getId', $id);
            }
            else{
                voltarMenu();
            }
            
        }
    }

}

function menuFuncionarios() {}

while (true) {
    system('clear');
    echo "========Clínica Veterinária========\n";
    echo "1-Clientes\n2-Animais\n3-Produtos\n4-Vender\n5-Funcionários\n";
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
            venda();
            break;
        case 5:
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
