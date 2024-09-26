SELECT vendedor.codVendedor, vendedor.nome, vendedor.endereco,  cidade.nome, estado.nome FROM vendedor
INNER JOIN cidade
ON vendedor.codCidade = cidade.codCidade
INNER JOIN estado
ON cidade.siglaEstado = estado.siglaEstado;

SELECT codVenda, dataVenda, vendedor.nome FROM venda
INNER JOIN vendedor
ON  venda.codVendedor = vendedor.codVendedor
WHERE status = 'Despachada';

SELECT clienteFisico.nome FROM clienteFisico JOIN cliente ON clienteFisico.codCliente = cliente.codCliente WHERE endereco = 'Rua Marechal Floriano, 56';

SELECT * FROM clienteJuridico;

SELECT clienteJuridico.nomeFantasia, cliente.endereco, cliente.telefone, cidade.nome, cidade.siglaEStado FROM clienteJuridico
INNER JOIN cliente
ON clienteJuridico.codCliente = cliente.codCliente
INNER JOIN cidade
ON  cliente.codCidade = cidade.codCidade
WHERE cliente.dataCadastro BETWEEN 01/01/1999 AND 30/06/2003;  

SELECT vendedor.nome FROM vendedor JOIN venda ON venda.codVendedor = vendedor.codVendedor JOIN clienteJuridico ON venda.codCliente = clienteJuridico.codCliente WHERE clienteJuridico.nomeFantasia = 'Gelinski';

SELECT produtoLote.codProduto, numeroLote, produto.descricao FROM produtoLote
INNER JOIN produto
ON produtoLote.codProduto = produto.codProduto
WHERE produtoLote.dataValidade < CURRENT_TIMESTAMP; 

SELECT departamento.nome, vendedor.nome FROM departamento
INNER JOIN vendedor
ON departamento.codDepartamento = vendedor.codDepartamento;