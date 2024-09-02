<?php
$users = [[
    'user' => 'admin',
    'password' => 'admin'
]

];

$login = false;

function registerUser(){
    global $users;
    $user = readline ("Informe o usuário: ");
    $password = readline ("Crie uma senha: ");
    $passwordConfirm = readline ("Confirmar senha: ");
    if($user == $users['user']){
        echo "\nUsuário já existente, tente novamente!\n";
        readline("Pressione ENTER para continuar . . .");
    }
}

function menu(){
    global $login;
    $choice = NULL;
    while($login == true){
        echo "\n1-Vender\n2-Cadastrar novo usuário\n3-Verificar Log\n4-Deslogar\n";
        $choice = readline("Digite a opção aqui: ");
        switch($choice){
            case 1:
                
                break;
            case 2:
                
                break;
            case 3:
                
                break;      
            case 4:
                
                break;   
            default:
                echo "\nOpção inválida, tente novamente !\n";
                readline("Pressione ENTER para continuar . . .");
                break;       
        }
    }
}

function login(){
    global $users;
    global $login;
    $user = readline("Digite o usuário: ");
    $password = readline("Digite a senha: ");
    if($user != $users['user'] or $password != $users['password']){
        echo "\nUsuário ou senha incorretos!\nTente novamente . . .\n";
        return login();
    }
    else{
        $login = true;
        menu();
    }
} 

login();