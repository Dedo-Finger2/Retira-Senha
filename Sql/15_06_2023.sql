/*
* Criando a tabela CADASTRO para que possamos usar nossa funcionalidade de Login, Cadastro e Visualização das senhas da pessoa
*/
CREATE TABLE IF NOT EXISTS cadastro (
	cod_cadastro INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(30) NOT NULL,
    rg VARCHAR(12) NOT NULL,
    PRIMARY KEY (cod_cadastro)
);