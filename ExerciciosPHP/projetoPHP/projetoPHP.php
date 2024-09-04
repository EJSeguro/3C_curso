<?php
$users = [
    [
        'user' => 'admin',
        'password' => 'admin'
    ]
];

$products = [];

$login = false;
$userLogin = '';

function registerUser()
{
    global $users;
    while (true) {
        echo "\nDeseja criar um usuário? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            $user = readline("Informe o usuário: ");
            $verifyUser = array_search($user, array_column($users, 'user'));
            if ($verifyUser != '') {
                echo "\nUsuário já existente, tente novamente!\n";
                readline("Pressione ENTER para tentar novamente . . .");
            } else {
                $password = readline("Crie uma senha: ");
                $passwordConfirm = readline("Confirmar senha: ");
                if ($passwordConfirm != $password) {
                    readline("Senhas diferentes, pressione ENTER para tentar novamente . . .");
                } else {
                    $user = [
                        'user' => $user,
                        'password' => $password
                    ];
                    $users[] = $user;
                    readline("Pressione ENTER para voltar ao menu. . .");
                    system('clear');
                    return menu();
                }
            }
        } else {
            return menu();
        }
    }
}

function registerProduct()
{
    global $products;
    while (true) {
        echo "\nDeseja cadastrar um produto? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            $productName = readline("Informe o nome do produto: ");
            $verifyProduct = array_search($productName, array_column($products, 'name'));
            if ($verifyProduct != '') {
                echo "\nProduto já cadastrado, tente novamente!\n";
                readline("Pressione ENTER para tentar novamente . . .");
            }
            else{
                $productPrice = readline("Informe o preço: ");
                $productQTD = readline("Informe a quantidade em estoque: ");
                $product = [
                    'id' => count($products)+1,
                    'name' => $productName,
                    'price' => $productPrice,
                    'QTD' => $productQTD
                ];
                $products[] = $product;
                readline("Produto adicionado com sucesso, pressione ENTER para constinuar. . .");
                system('clear');
            }
        } else {
            return sellMenu();
        }
    }
}

function sellMenu()
{
    global $products;
    while (true) {
        system('clear');
        for ($i = 0; $i < count($products); $i++){
            echo "ID: " .  $products[$i]['id'] . " Nome: " . $products[$i]['name'] . " Preço: " . $products[$i]['price'] . " Estoque: " . $products[$i]['QTD'] . "\n";
        }
        echo "1-Vender 2-Cadastrar Produto 3-Voltar\n";
        $choice = readline("Digite aqui: ");
        switch ($choice) {
            case 1:
                break;
            case 2:
                return registerProduct();
                break;
            case 3:
                return menu();
                break;
            default:
                echo "\nOpção inválida, tente novamente !\n";
                readline("Pressione ENTER para continuar . . .");
                system('clear');
                break;
        }
    }
}

function menu()
{

    $choice = NULL;
    while (true) {
        system('clear');
        echo "=======CAIXA=======";
        echo "\n1-Vender\n2-Cadastrar novo usuário\n3-Verificar Log\n4-Deslogar\n";
        $choice = readline("Digite a opção aqui: ");
        switch ($choice) {
            case 1:
                return sellMenu();
                break;
            case 2:
                return registerUser();
                break;
            case 3:

                break;
            case 4:
                return login();
                break;
            default:
                echo "\nOpção inválida, tente novamente !\n";
                readline("Pressione ENTER para continuar . . .");
                system('clear');
                break;
        }
    }
}

function login()
{
    global $users;
    global $userLogin;

    while (true) {
        $userLogin = readline("Digite o usuário: ");
        $confirmUser = array_search($userLogin, array_column($users, 'user'));
        if ($confirmUser == '') {
            readline("Usuário inexistente! Pressione ENTER para continuar . . .");
        } else {
            $password = readline("Digite a senha: ");
            if (in_array($password, $users[$confirmUser])) {
                system('clear');
                return menu();
            } else {
                readline("Senha incorreta! Pressione ENTER para continuar . . .");
            }
        }
    }
}

login();
