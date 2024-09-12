<?php
    require_once "Humano.php";

    class Funcionario extends Humano{
        private $cargo;
        private $humano;
        private $salario;
        public function __construct($humano, $cargo, $salario) {
            $this->humano = $humano;
            $this->cargo = $cargo; 
            $this->salario = $salario;       
        }

        public function getHumano(){
            return $this->humano;
        }

        public function getCargo(){
            return $this->cargo;
        }

        public function getSalario(){
            return $this->salario;
        }
    }