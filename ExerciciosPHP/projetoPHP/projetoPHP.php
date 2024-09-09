<?php
date_default_timezone_set('America/Sao_Paulo');

$users = [
    [
        'user' => 'admin',
        'password' => 'admin'
    ]
];
$userLogin = '';

$products = [];

$logs = [];

function timeDay(){
    return date('d/m/Y H:i:s');
}
$login = false;
$userLogin = '';
$logsTXT = "Logs";


function saveLogs($log)
{
    global $logs;
    global $logsTXT;
    $logsTXT = fopen("Logs.txt", "a");
    $logs[] = $log;
    fwrite($logsTXT, $log . PHP_EOL);
    fclose($logsTXT);
}

function logView()
{
    global $logs;
    while (true) {
        system('clear');
        echo "\nDeseja verificar o log? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            foreach ($logs as $log) {
                echo $log . "\n";
            }
            readline("Precione ENTER para voltar . . .");
        } else {
            return menu();
        }
    }
}


function registerUser()
{
    global $users;
    while (true) {
        system('clear');
        echo "\nDeseja criar um usuário? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            system('clear');
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
                    $log = "Cadastro realizado do usuário: ". $user['user'] . ", " . timeDay();
                    saveLogs($log);
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
        system('clear');
        echo "\nDeseja cadastrar um produto? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            system('clear');
            $productName = readline("Informe o nome do produto: ");
            $verifyProduct = array_search($productName, array_column($products, 'name'));
            if ($verifyProduct != '') {
                echo "\nProduto já cadastrado, tente novamente!\n";
                readline("Pressione ENTER para tentar novamente . . .");
            } else {
                $productPrice = readline("Informe o preço: ");
                $productQTD = readline("Informe a quantidade em estoque: ");
                $newId = end($products);
                $newId = $newId ? $newId['id'] + 1 : 1;
                $product = [
                    'id' => $newId,
                    'name' => $productName,
                    'price' => $productPrice,
                    'QTD' => $productQTD
                ];
                $products[] = $product;
                $log = $productName . " adicionado ao estoque, " . timeDay();
                saveLogs($log);
                readline("Produto adicionado com sucesso, pressione ENTER para constinuar. . .");
                system('clear');
            }
        } else {
            return sellMenu();
        }
    }
}

function productUpdate()
{
    global $products;
    while (true) {
        system('clear');
        echo "\nDeseja editar um produto? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            foreach ($products as $product) {
                echo "ID: " .  $product['id'] . " Nome: " . $product['name'] . " Preço: " . $product['price'] . " Estoque: " . $product['QTD'] . "\n";
            }
            $choiceProduct = readline("Digite o ID do produto que deseja editar: ");
            $verifyProduct = array_search($choiceProduct, array_column($products, 'id'));
            if ($verifyProduct == '') {
                echo "\nProduto inexistente, tente novamente!\n";
                readline("Pressione ENTER para tentar novamente . . .");
            } else {
                echo "\nO que deseja editar? 1-Nome 2-Preço 3-Quantidade\n";
                $choiceEdit = readline("Digite aqui: ");
                switch ($choiceEdit) {
                    case 1:
                        $newName = readline("Digite o novo nome: ");
                        $products [$verifyProduct]['name'] = $newName;
                        $log = "Nome do ID " . $verifyProduct + 1 . " modificado, " . timeDay();
                        saveLogs($log);
                        break;
                    case 2:
                        $newPrice = readline("Digite o novo preço: ");
                        $products [$verifyProduct]['price'] = $newPrice;
                        $log = "Preço do ID " . $verifyProduct + 1 . " modificado, " . timeDay();
                        saveLogs($log);
                        break;
                    case 3:
                        $newQTD = readline("Digite a quantidade: ");
                        $products [$verifyProduct]['QTD'] = $newQTD;
                        $log = "Quantidade do ID " . $verifyProduct + 1 . " modificada, " . timeDay();
                        saveLogs($log);
                        break;
                    default:
                        echo "\nOpção inválida, tente novamente !\n";
                        readline("Pressione ENTER para continuar . . .");
                        break;
                }
            }
        } else {
            return sellMenu();
        }
    }
}

function productDelete()
{
    global $products;
    $productId = 0;
    while (true) {
        system('clear');
        echo "\nDeseja remover um produto? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            system('clear');
            $productId = readline("Informe o id do produto: ");
            $verifyProduct = array_search($productId, array_column($products, 'id'));
            if ($verifyProduct == '') {
                echo "\nID inválido, tente novamente!\n";
                readline("Pressione ENTER para tentar novamente . . .");
            } else {
                unset($products[$verifyProduct]);
                $log = "Produto, ID " . $verifyProduct + 1 . " deletado, " . timeDay();
                saveLogs($log);
                readline("Produto removido com sucesso, pressione ENTER para constinuar. . .");
                system('clear');
            }
        } else {
            return sellMenu();
        }
    }
}

function sell(){
    global $products;
    $productId = 0;
    while (true) {
        system('clear');
        echo "\nDeseja vender um produto? 1-Continuar 2-Voltar\n";
        $choice = readline("Digite aqui: ");
        if ($choice == 1) {
            system('clear');
            $productId = readline("Informe o id do produto: ");
            $verifyProduct = array_search($productId, array_column($products, 'id'));
            if ($verifyProduct == '') {
                echo "\nID inválido, tente novamente!\n";
                readline("Pressione ENTER para tentar novamente . . .");
            } else {
                $productQTD = readline("Informe quantos itens serão vendidos: ");
                if($productQTD > $products[$verifyProduct]['QTD']){
                    readline("Quantidade indisponível, pressione ENTER para constinuar. . .");
                }
                else{
                    $products[$verifyProduct]['QTD'] -= $productQTD;
                    $totalSell = $products[$verifyProduct]['price']*$productQTD;
                    $log = "Venda: ID " . $verifyProduct + 1 . " QTD: $productQTD Valor da venda: $totalSell, " . timeDay();
                    saveLogs($log);
                    readline("Venda realizada com sucesso, pressione ENTER para constinuar. . .");
                }
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
        foreach ($products as $product) {
            echo "ID: " .  $product['id'] . " Nome: " . $product['name'] . " Preço: " . $product['price'] . " Estoque: " . $product['QTD'] . "\n";
        }
        echo "1-Vender 2-Gerenciar Produtos 3-Voltar\n";
        $choice = readline("Digite aqui: ");
        switch ($choice) {
            case 1:
                return sell();
                break;
            case 2:
                $productMenus = true;
                while ($productMenus == true) {
                    echo "1-Adicionar Produto 2-Editar Produto 3-Deletar Produto 4-Voltar\n";
                    $choice = readline("Digite aqui: ");
                    switch ($choice) {
                        case 1:
                            return registerProduct();
                            break;
                        case 2:
                            return productUpdate();
                            break;
                        case 3:
                            return productDelete();
                            break;
                        case 4:
                            $productMenus = false;
                            break;
                        default:
                            echo "\nOpção inválida, tente novamente !\n";
                            readline("Pressione ENTER para continuar . . .");
                            break;
                    }
                }
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
    global $userLogin;
    $choice = NULL;
    while (true) {
        system('clear');
        echo "=======CAIXA=======";
        echo "\n1-Produtos\n2-Cadastrar novo usuário\n3-Verificar Log\n4-Deslogar\n";
        $choice = readline("Digite a opção aqui: ");
        switch ($choice) {
            case 1:
                return sellMenu();
                break;
            case 2:
                return registerUser();
                break;
            case 3:
                return logView();
                break;
            case 4:
                $log = "Usuário $userLogin deslogou, " . timeDay();
                saveLogs($log);
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
    global  $userLogin;
    global $users;
    global $userLogin;
    while (true) {
        system('clear');
        $userLogin = readline("Digite o usuário: ");
        $confirmUser = array_search($userLogin, array_column($users, 'user'));
        if ($confirmUser == '') {
            readline("Usuário inexistente! Pressione ENTER para continuar . . .");
        } else {
            $password = readline("Digite a senha: ");
            if (in_array($password, $users[$confirmUser])) {
                $log = "Usuário $userLogin efetuou login, " . timeDay();
                saveLogs($log);
                system('clear');
                return menu();
            } else {
                readline("Senha incorreta! Pressione ENTER para continuar . . .");
            }
        }
    }
}


login();
