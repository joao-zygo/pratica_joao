create database pratica_joao;
use pratica_joao;
CREATE TABLE cliente(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(100) NOT NULL
);

CREATE TABLE colaborador(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
    );
CREATE TABLE chamado(
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT NOT NULL ,
    descricao TEXT NOT NULL,
    criticidade VARCHAR(15),
    status VARCHAR(15) NOT NULL,
    data_abertura DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_colaborador INT NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id),
    FOREIGN KEY (id_colaborador) REFERENCES colaborador(id)
);
