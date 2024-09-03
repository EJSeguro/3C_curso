<?php
$users = [
    [
        'user' => 'admin',
        'password' => 'admin'
    ]
];

$login = false;

function registerUser(){
    global $users;
    while(true){
    $choice = readline("Deseja continuar? 1-Sim 2-Não\nDigite aqui: ");
    $user = readline ("Informe o usuário: ");
    $verifyUser = array_search($user, array_column($users, 'user'));
    if($verifyUser != ''){
        echo "\nUsuário já existente, tente novamente!\n";
        readline("Pressione ENTER para tentar novamente . . .");
    }
    else{
        $password = readline ("Crie uma senha: ");
        $passwordConfirm = readline ("Confirmar senha: ");
        if($passwordConfirm != $password){
            readline("Senhas diferentes, pressione ENTER para tentar novamente . . .");
        }
        else{
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
                registerUser();
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

function login(){
    global $users;
    global $login;
   
    while(true){
    $user = readline("Digite o usuário: ");
    $confirmUser = array_search($user, array_column($users, 'user'));
    if($confirmUser == ''){
        readline("Usuário inexistente! Pressione ENTER para continuar . . .");
    }
    else{
        $password = readline("Digite a senha: ");
        if(in_array($password, $users[$confirmUser])){
            $login = true;
            system('clear');
            return menu();
        }   
        else{
            readline("Senha incorreta! Pressione ENTER para continuar . . .");
        }     
    }
    }
    

    
} 

login();