<?php

    class Humano{
        private $nome;
        private $cpf;
        private $idade;
        private $endereco;
        private $contato;

        public function __construct($nome, $cpf, $idade, $endereco, $contato)
        {
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->idade = $idade;
            $this->endereco = $endereco;
            $this->contato = $contato;
        }

        public function __toString()
        {
            return "Nome: $this->nome\nCPF: $this->cpf\nIdade: $this->idade\nEndereço: $this->endereco\nContato: $this->contato";           
        }

        public function getNome(){
            return $this->nome;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function getContato(){
            return $this->contato;
        }

        public function getCpf() {
            return $this->cpf;
        }
        
    }
