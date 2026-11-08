SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET NAMES utf8;

CREATE DATABASE jogos_bd;
USE jogos_bd;

CREATE TABLE IF NOT EXISTS jogos (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_produto varchar(20) NOT NULL,
    nome varchar(255) NOT NULL,
    plataforma varchar(100) NOT NULL,
    preco decimal(10,2) NOT NULL,
    genero varchar(100) NOT NULL,
    ano_lancamento int(4) NOT NULL,
    classificacao_indicativa varchar(20) NOT NULL,
    data_chegada date NOT NULL,
    quantidade_estoque int(11) NOT NULL,
    estado_conservacao varchar(100) NOT NULL,
    tipo_midia varchar(50) NOT NULL,
    descricao varchar(500) NOT NULL,
    data_criacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

SQL
INSERT INTO `jogos` (`codigo_produto`,`nome`,`plataforma`,`preco`,`genero`,
`ano_lancamento`,`classificacao_indicativa`,`data_chegada`,`quantidade_estoque`,
`estado_conservacao`,`tipo_midia`,`descricao`,`data_criacao`,`data_atualizacao`)
VALUES
('SMW001','Super Mario World','Super Nintendo','149.90','Aventura',
'1990','Livre','2026-09-01','5','Excelente','Cartucho',
'Jogo clássico do Super Nintendo protagonizado por Mario.',
'2026-06-04 00:00:00','2026-07-31 00:00:00'),
 
('PAC001','Pac-Man','Arcade','199.90','Ação',
'1980','Livre','2026-09-05','3','Bom','Cartucho',
'Clássico jogo de arcade em que o jogador controla Pac-Man.',
'2026-08-21 00:00:00','2026-09-21 00:00:00'),
 
('SON001','Sonic The Hedgehog','Mega Drive','129.90','Plataforma',
'1991','Livre','2026-09-10','4','Excelente','Cartucho',
'O famoso ouriço azul da Sega em sua primeira aventura.',
'2026-09-10 00:00:00','2026-09-10 00:00:00'),
 
('ZEL001','The Legend of Zelda: Ocarina of Time','Nintendo 64','249.90','Aventura',
'1998','10 Anos','2026-09-15','2','Muito Bom','Cartucho',
'Um dos jogos mais aclamados da franquia Zelda.',
'2026-09-15 00:00:00','2026-09-15 00:00:00');
