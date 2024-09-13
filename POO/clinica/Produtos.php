<?php



class Produtos
{

    private $produto;
    private $preco;
    private $qtd;
    public function __construct($produto, $preco, $qtd)
    {

        $this->produto = $produto;
        $this->preco = $preco;
        $this->qtd = $qtd;
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
