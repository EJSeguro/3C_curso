<?php
    require_once "Produtos.php";
    require_once "Humano.php";

    class Vendas{
        private $humano;
        private $produtos;

        public function __construct($humano, $produtos)
        {
            $this->produtos = $produtos;
            $this->humano = $humano;
        }

        public function getHumano(){
            return $this->humano;
        }

        public function getProdutos(){
            return $this->produtos;
        }
    }

