CREATE DATABASE modelagem3;

CREATE TABLE cidade(
    codCidade PRIMARY KEY SERIAL,
    nome VARCHAR(50) NOT NULL UNIQUE,
    siglaEstado char(2) NOT NULL REFERENCES estado(siglaEstado) ON DELETE no action ON UPDATE cascade
);

CREATE TABLE vendedor(
	codvendedor serial PRIMARY KEY,
	nome varchar(60) NOT NULL,
	dataNascimento date,
	endereco varchar(60),
	cep char(8),
	telefone varchar(20),
	codCidade int default 1,
	dataContratacao date default (current_date),
	codDepartamento int,
	FOREIGN KEY (codDepartamento) REFERENCES departamento (codDepartamento) ON DELETE set null 
	ON UPDATE cascade,
	FOREIGN KEY (codCidade) REFERENCES cidade (codCidade) ON DELETE cascade ON UPDATE cascade
);

CREATE TABLE cliente (
	codCliente serial PRIMARY KEY,
	endereco varchar(60),
	codCidade int NOT NULL,
	telefone varchar(20),
	tipo char(1), 
	dataCadastro date default (current_date),
	cep char(8),
	CONSTRAINT fk_cli_cid FOREIGN KEY (codCidade) REFERENCES cidade (codCidade) ON DELETE no action ON UPDATE cascade
);

CREATE TABLE clienteFisico (
    codCliente SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    dataNascimento date,
    cpf CHAR(11) NOT NULL UNIQUE,
    rg VARCHAR(8),
    FOREIGN KEY (codCliente) REFERENCES cliente (codCliente) ON DELETE no action ON UPDATE cascade
);

CREATE TABLE clienteJuridico (
    codCliente SERIAL PRIMARY KEY,
    nomeFantasia VARCHAR(80) NOT NULL UNIQUE,
    razaoSocial VARCHAR(80) NOT NULL UNIQUE,
    ie VARCHAR(20) NOT NULL UNIQUE,
    cgc VARCHAR(20) NOT NULL UNIQUE,
    FOREIGN KEY (codCliente) REFERENCES cliente (codCliente) ON DELETE no action ON UPDATE cascade

);

CREATE TABLE produto (
    codProduto SERIAL PRIMARY KEY,
    descricao VARCHAR(40) NOT NULL,
    unidadeMedida CHAR(2),
    embalagem VARCHAR(15) default('Fardo'),
    codClasse INT,
    precoVenda NUMERIC(14, 2),
    estoqueMinimo NUMERIC(14, 2),
    FOREIGN KEY (codClasse) REFERENCES classe (codClasse) ON DELETE set null ON UPDATE set null
);



