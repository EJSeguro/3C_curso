<?php
require_once "Ornitorrinco.php";
require_once "Gato.php";
require_once "Cachorro.php";
require_once "Humano.php";

class Animal
{

    private $name;
    private $raca;
    private $qtdPatas;
    private $color;
    private $peso;
    private $tamanho;
    private Humano $humano;

    public function __construct($name, $raca, $qtdPatas, $color, $peso, $tamanho, $humano)
    {
        $this->name = $name;
        $this->raca = $raca;
        $this->qtdPatas = $qtdPatas;
        $this->color = $color;
        $this->peso = $peso;
        $this->tamanho = $tamanho;
        $this->humano = $humano;

    }

    public function descricaoAnimal()
    {
        echo "Nome: $this->name Raça: $this->raca Patas: $this->qtdPatas Cor: $this->color Peso: $this->peso Tamanho: $this->tamanho\n======Dono======$this->humano\n";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRaca()
    {
        return $this->raca;
    }

    public function getQTDPatas()
    {
        return $this->qtdPatas;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }
    
    public function getHumano(){
        return $this->humano;
    }

    public function falar()
    {
        echo "O bicho faz barulho";
    }

}
