<?php
    // require_once "Animal.php";
    require_once "Humano.php";
    // require_once "Funcionario";
    
    $humanos = [];
    $animais = [];
    $produtos = [];
    $vendas = [];

    function opcaoInvalida(){
        readline("\nOpção inválida! Pressione ENTER para continuar . . .");
    }

    function findObject ($array, $getter, $value) {
        foreach($array as $element) {
            if ($element->$getter() == $value) {
                return $element;
            }
        }
    
        return null;
    }

    function printObjects ($array) {
        foreach($array as $element) {
            echo "$element";
        }
    }

    function menuClientes(){
        system('clear');
        echo "========Clientes========\n";
        echo "1-Cadastrar\n2-Verificar\nENTER - Voltar";
        $escolha = readline("Digite aqui: ");
        match($escolha){
            1 => cadastrarCliente(), 
            2 => verificarCliente(),
            default => readline("Voltando ao menu! Pressione ENTER para continuar!"),
        };
    }

    function menuAnimais(){
        system('clear');
        echo "========Animais========\n";
        echo "1-Cadastrar\n2-Verificar\nENTER - Voltar";
        $escolha = readline("Digite aqui: ");
        match($escolha){
            1 => cadastrarAnimais(), 
            2 => verificarAnimais(),
            default => readline("Voltando ao menu! Pressione ENTER para continuar!"),
        };
    }

    function menuProdutos(){
        system('clear');
        echo "========Produtos========\n";
        echo "1-Cadastrar\n2-Verificar\n3-Editar\n4-Remover\nENTER - Voltar\n";
        $escolha = readline("Digite aqui: ");
        match($escolha){
            1 => cadastrarProduto(), 
            2 => verificarVerificar(),
            3 => editarProduto(),
            4 => removerProduto(),
            default => readline("Voltando ao menu! Pressione ENTER para continuar!"),
        };
    }
    
    function menuFuncionarios(){
        system('clear');
    }
    
    while(true){
        system('clear');
        echo "========Clínica Veterinária========\n";
        echo "1-Clientes\n2-Animais\n3-Produtos\n4-Funcionários\n";
        $escolha = readline("Digite aqui: ");
        match($escolha){
            1 => menuClientes(), 
            2 => menuAnimais(),
            3 => menuProdutos(),
            4 => menuFuncionarios(),
            default => readline("Opção inválida! Pressione ENTER para tentar novamente!"),
        };
    }

    $cpf = readline("digite o cpf do cria");
    $cria = findObject($humanos, 'getCpf', $cpf);
    var_dump($cria);
    
