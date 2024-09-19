<?php
    require_once "Humano.php";

    class Funcionario extends Humano{
        private $cargo;
        private $salario;
        public function __construct($nome, $cpf, $idade, $endereco, $contato, $cargo, $salario) {
            parent::__construct($nome, $cpf, $idade, $endereco, $contato);
            $this->cargo = $cargo; 
            $this->salario = $salario;       
        }

        public function getCargo(){
            return $this->cargo;
        }

        public function getSalario(){
            return $this->salario;
        }

        public function setSalario($value){
            $this->salario = $value;
        }

        public function setCargo($value){
            $this->cargo = $value;
        }

        public function descricaoFuncionario(){
            echo "\nNome: " . parent::getNome() . " Cpf: " . parent::getCpf() . " Idade: ". parent::getIdade() . " Endereço: " . parent::getEndereco() . " Contato: " . parent::getContato() . " Cargo: $this->cargo Salário: $this->salario\n";
        }
    }