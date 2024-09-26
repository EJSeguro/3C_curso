SELECT vendedor.codVendedor, vendedor.nome, vendedor.endereco,  cidade.nome, estado.nome FROM vendedor
INNER JOIN cidade
ON vendedor.codCidade = cidade.codCidade
INNER JOIN estado
ON cidade.siglaEstado = estado.siglaEstado;

SELECT codVenda, dataVenda, vendedor.nome FROM venda
INNER JOIN vendedor
ON  venda.codVendedor = vendedor.codVendedor
WHERE status = 'Despachada';

SELECT * FROM clienteFisico; -----SEI LÁ----- 

SELECT * FROM clienteJuridico;

5) SEI LÁ

6)  SEI LÁ

SELECT produtoLote.codProduto, numeroLote, produto.descricao FROM produtoLote
INNER JOIN produto
ON produtoLote.codProduto = produto.codProduto
WHERE produtoLote.dataValidade < CURRENT_TIMESTAMP; 

SELECT departamento.nome, vendedor.nome FROM departamento
INNER JOIN vendedor
ON departamento.codDepartamento = vendedor.codDepartamento;