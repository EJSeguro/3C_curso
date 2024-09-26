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
	FOREIGN KEY (codCidade) REFERENCES cidade (codCidade) ON DELETE cascade ON UPDATE cascade);



