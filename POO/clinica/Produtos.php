<?php

class Produtos
{
    private $id;
    private $produto;
    private $preco;
    private $qtd;
    public function __construct($id, $produto, $preco, $qtd)
    {
        $this->id = $id;
        $this->produto = $produto;
        $this->preco = $preco;
        $this->qtd = $qtd;
    }

    public function __toString()
    {
        return "ID: $this->id Produto: $this->produto Preço: R$ $this->preco Estoque: $this->qtd\n";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function getQTD()
    {
        return $this->qtd;
    }

    public function setQTD($valor)
    {
        $this->qtd = $valor;
    }

    public function setPreco($valor)
    {
        $this->preco = $valor;
    }

    public function setProduto($valor)
    {
        $this->produto = $valor;
    }

}
