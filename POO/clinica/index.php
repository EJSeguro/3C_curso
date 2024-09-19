<?php
require_once "Animal.php";
require_once "Humano.php";
require_once "Produtos.php";
require_once "Funcionario.php";

$humanos = [];
$animais = [];
$produtos = [];
$funcionarios = [];

function opcaoInvalida()
{
    readline("\nOpção inválida! Pressione ENTER para continuar . . .");
}

function voltarMenu()
{
    readline("\nVoltando ao menu! Pressione ENTER para continuar!");
}

function continuar()
{
    readline("\nPressione ENTER para continuar . . . ");
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
        if ($escolha == 1) {
            cadastrarCliente();
        } else {
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
        switch ($animalTipo) {
            case 1:
                $animal = new Cachorro($name, $raca, $qtdPatas, $color, $peso, $tamanho, $verifyCpf);
                $animais[] = $animal;
                break;
            case 2:
                $animal = new Gato($name, $raca, $qtdPatas, $color, $peso, $tamanho, $verifyCpf);
                $animais[] = $animal;
                break;
            case 3:
                $animal = new Ornitorrinco($name, $raca, $qtdPatas, $color, $peso, $tamanho, $verifyCpf);
                $animais[] = $animal;
                break;
            default:
                opcaoInvalida();
                break;
        }
        echo "\nAnimal cadastrado com sucesso!\n";
        voltarMenu();
    }
}

function verificarAnimais()
{
    global $animais;
    global $humanos;
    system('clear');
    $cpf = readline("Informe o cpf do dono: ");
    $humano = findObject($humanos, 'getCpf', $cpf);
    $animal = findObject($animais, 'getHumano', $humano);
    if ($animal == NULL) {
        echo "\nNenhum animal cadastrado!\n";
        voltarMenu();
    } else {
        $animal->descricaoAnimal();
        voltarMenu();
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

function cadastrarProdutos()
{
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

function verificarProdutos()
{
    global $produtos;
    system('clear');
    foreach ($produtos as $produto) {
        echo $produto;
    }
    voltarMenu();
}

function editarProdutos()
{
    global $produtos;
    system('clear');
    foreach ($produtos as $produto) {
        echo $produto;
    }
    $id = readline("Informe o ID do produto que deseja editar: ");
    $verifyId = findObject($produtos, 'getId', $id);
    if ($verifyId == NULL) {
        echo "ID não encontrado!\n";
        voltarMenu();
    } else {
        echo "1-Nome\n2-Preço\n3-Estoque\nENTER - Voltar\n";
        $escolha = readline("Digite aqui: ");
        switch ($escolha) {
            case 1:
                $nome = readline("Informe o novo nome: ");
                $verifyId->setProduto($nome);
                echo "Alterações feitas com sucesso!\n";
                voltarMenu();
                break;
            case 2:
                $preco = readline("Informe o novo preço: ");
                $verifyId->setPreco($preco);
                echo "Alterações feitas com sucesso!\n";
                voltarMenu();
                break;
            case 3:
                $qtd = readline("Informe a nova quantidade: ");
                $verifyId->setQTD($qtd);
                echo "Alterações feitas com sucesso!\n";
                voltarMenu();
                break;
            default:
                opcaoInvalida();
                break;
        }
    }
}

function removerProdutos()
{
    global $produtos;
    system('clear');
    foreach ($produtos as $produto) {
        echo $produto;
    }
    $id = readline("Informe o ID do produto que deseja remover: ");
    $verifyId = findObject($produtos, 'getId', $id);
    if ($verifyId == NULL) {
        echo "ID não encontrado!\n";
        voltarMenu();
    } else {
        echo "Tem certeza que deseja excluir o ID $id? 1-Sim 2-Não\n";
        $escolha = readline("Digite aqui: ");
        if ($escolha == 1) {
            $verifyObjeto = array_search($verifyId, $produtos);
            unset($produtos[$verifyObjeto]);
            echo "ID deletado com sucesso!\n";
            voltarMenu();
        } else {
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

function venda()
{
    global $humanos;
    global $produtos;
    $carrinhoCompra = [];
    system('clear');
    echo "========Vender========\n";
    echo "1-Vender\nENTER - Voltar\n";
    $escolha = readline("Digite aqui: ");
    if ($escolha == 1) {
        $cpf = readline("Informe o cpf do cliente: ");
        $humano = findObject($humanos, 'getCpf', $cpf);
        if ($humano == NULL) {
            echo "Cliente não registrado!\n";
            voltarMenu();
        } else {
            $carrinho = true;
            while ($carrinho == true) {
                system('clear');
                echo "=======Carrinho=======\n";
                foreach ($carrinhoCompra as $produto) {
                    echo $produto;
                }
                echo "1-Adicionar produto 2-Finalizar compra 3-Voltar ao menu\n";
                $escolha = readline("Digite aqui:");
                switch ($escolha) {
                    case 1:
                        foreach ($produtos as $produto) {
                            echo $produto;
                        }
                        $id = readline("Digite o id do produto desejado: ");
                        $verifyId = findObject($produtos, 'getId', $id);
                        if ($verifyId == NULL) {
                            echo "Nenhum produto encontrado !\n";
                            continuar();
                        } else {
                            $carrinhoCompra[] = $verifyId;
                        }
                        break;

                    case 2:
                        echo "Deseja finalizar compra? 1-Sim 2-Não\n";
                        $escolha = readline("Digite aqui:");
                        if ($escolha == 1) {
                            $humano->setCompra($carrinhoCompra);
                            $carrinhoCompra = [];
                            echo "Compra realizada com sucesso !!!\n";
                            voltarMenu();
                            $carrinho = false;
                        }
                        break;

                    case 3:
                        voltarMenu();
                        $carrinho = false;
                        break;
                }
            }
        }
    } else {
        voltarMenu();
    }
}

function cadastrarFuncionário()
{
    global $funcionarios;
    system('clear');

    $cpf = readline("Informe o cpf do funcionario: ");
    $funcionario = findObject($funcionarios, 'getHumano', $cpf);
    if ($funcionario == NULL) {
        $nome = readline("Informe o nome do funcionário: ");
        $idade = readline("Informe a idade do funcionário: ");
        $endereco = readline("Informe o endereco do funcionário: ");
        $contato = readline("Informe o contato do funcionário: ");
        $cargo = readline("Informe o cargo: ");
        $salario = readline("Informe o salário: R$");
        $funcionario = new Funcionario($nome, $cpf, $idade, $endereco, $contato, $cargo, $salario);
        $funcionarios[] = $funcionario;
        system('clear');
        echo "Funcionário cadastrado com sucesso!\n";
        voltarMenu();
    } 
    else {
        system('clear');
        echo "Funcionário já cadastrado!\n";
        voltarMenu();
    }
}

function verificarFuncionário()
{
    global $funcionarios;
    system('clear');
    echo "======Funcionários======\n";
    foreach ($funcionarios as $funcionario) {
        $funcionario->descricaoFuncionario();
    }
    voltarMenu();
}

function editarFuncionário()
{
    global $funcionarios;
    system('clear');
    foreach ($funcionarios as $funcionario) {
        echo $funcionario;
    }
    $cpf = readline("Informe o CPF do funcionário: ");
    $funcionario = findObject($funcionarios, 'getCpf', $cpf);
    if ($funcionario == NULL) {
        echo "CPF não encontrado!\n";
        voltarMenu();
    } else {
        echo "1-Nome\n2-Salário\n3-Função\n4-Remover\nENTER - Voltar\n";
        $escolha = readline("Digite aqui: ");
        switch ($escolha) {
            case 1:
                $nome = readline("Informe o novo nome: ");
                $funcionario->setNome($nome);
                echo "Alterações feitas com sucesso!\n";
                voltarMenu();
                break;
            case 2:
                $salario = readline("Informe o novo salario: ");
                $funcionario->setSalario($salario);
                echo "Alterações feitas com sucesso!\n";
                voltarMenu();
                break;
            case 3:
                $cargo = readline("Informe o novo cargo: ");
                $funcionario->setCargio($cargo);
                echo "Alterações feitas com sucesso!\n";
                voltarMenu();
                break;
            case 4:
                unset($funcionario);
                echo "Funcionário removido com sucesso!\n";
                voltarMenu();
                break;
            default:
                opcaoInvalida();
                break;
        }
    }
}

function menuFuncionarios()
{
    system('clear');
    echo "========Funcionários========\n";
    echo "1-Cadastrar 2-Verificar 3-Editar ENTER->Voltar\n";
    $escolha = readline("Digite aqui: ");
    switch ($escolha) {
        case 1:
            cadastrarFuncionário();
            break;
        case 2:
            verificarFuncionário();
            break;
        case 3:
            editarFuncionário();
            break;
        default:
            opcaoInvalida();
            break;
    }
}

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
