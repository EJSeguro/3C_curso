
SELECT * FROM produto;

SELECT codFornecedor, nomeFantasia, endereco, telefone, codCidade FROM fornecedor;

SELECT codVenda, dataVenda FROM venda WHERE status = 'Despachada';

SELECT * FROM clienteJuridico;

SELECT numeroLote FROM produtoLote WHERE dataValidade > '2000-10-10';

SELECT nome FROM departamento;