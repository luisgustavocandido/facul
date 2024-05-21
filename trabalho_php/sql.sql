CREATE DATABASE quiz_londrina;

USE quiz_londrina;

CREATE TABLE perguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enunciado VARCHAR(255) NOT NULL,
    opcao1 VARCHAR(100) NOT NULL,
    opcao2 VARCHAR(100) NOT NULL,
    opcao3 VARCHAR(100) NOT NULL,
    opcao4 VARCHAR(100) NOT NULL,
    resposta_correta VARCHAR(100) NOT NULL
);

CREATE TABLE ranking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    pontuacao INT NOT NULL,
    data DATE NOT NULL
);

INSERT INTO perguntas (enunciado, opcao1, opcao2, opcao3, opcao4, resposta_correta) VALUES
('Qual o ano de fundação do Londrina EC?', '1948', '1956', '1952', '1954', '1956'),
('Quantos títulos estaduais o Londrina EC possui?', '2', '3', '4', '5', '5'),
('Qual é o mascote do Londrina EC?', 'Tubarão', 'Leão', 'Águia', 'Tigre', 'Tubarão'),
('Em que estádio o Londrina EC manda seus jogos?', 'Estádio do Café', 'Maracanã', 'Mineirão', 'Morumbi', 'Estádio do Café'),
('Em que ano o Londrina EC ganhou a Copa da Primeira Liga', '2014', '2020', '1978', '2017', '2017');
