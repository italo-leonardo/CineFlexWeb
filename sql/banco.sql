 -- banco de dados
CREATE DATABASE cinema 
DEFAULT CHARACTER SET utf8mb4 
DEFAULT COLLATE utf8mb4_general_ci;

-- Tabela de usuários (clientes e administradores)
CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'cliente') DEFAULT 'cliente',
    PRIMARY KEY(id)
) DEFAULT CHARSET = utf8mb4;

-- Tabela de filmes disponíveis no sistema
CREATE TABLE filmes (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    duracao TIME NOT NULL,
    valor_ingresso DECIMAL(6,2) NOT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARSET = utf8mb4;

-- Tabela de sessões para os filmes (data, hora e sala)
CREATE TABLE sessao (
    id INT NOT NULL AUTO_INCREMENT,
    id_filme INT NOT NULL,
    data_hora DATETIME,
    sala INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (id_filme) REFERENCES filmes(id)
) DEFAULT CHARSET = utf8mb4;

-- Tabela de cadeiras disponíveis por sessão
CREATE TABLE cadeira (
    id INT NOT NULL AUTO_INCREMENT,
    numero INT NOT NULL,
    id_sessao INT NOT NULL,
    ocupado ENUM('S','N') DEFAULT 'N',
    PRIMARY KEY(id),
    FOREIGN KEY(id_sessao) REFERENCES sessao(id)
) DEFAULT CHARSET = utf8mb4;

-- Tabela de compras de ingressos realizadas por usuários
CREATE TABLE compra (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_sessao INT NOT NULL,
    data_compra DATETIME,
    valor_total DECIMAL(6,2),
    PRIMARY KEY(id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_sessao) REFERENCES sessao(id)
) DEFAULT CHARSET = utf8mb4;

-- Tabela de cadeiras reservadas associadas a uma compra
CREATE TABLE cadeira_reservada (
    id INT NOT NULL AUTO_INCREMENT,
    id_compra INT NOT NULL,
    id_cadeira INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_compra) REFERENCES compra(id),
    FOREIGN KEY (id_cadeira) REFERENCES cadeira(id)
) DEFAULT CHARSET = utf8mb4;
