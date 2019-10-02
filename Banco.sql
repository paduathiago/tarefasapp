create database if not exists tarefas;
use tarefas;
drop database tarefas;
CREATE TABLE if not exists item
(
	codigo INT NOT NULL auto_increment,
	nome VARCHAR(100) NOT NULL,
	prazo date NULL,
    concluida bool NOT NULL,
	primary key (codigo)
);

CREATE USER 'lista'@'localhost' IDENTIFIED BY 'senha123';

GRANT ALL PRIVILEGES ON tarefas.* TO 'lista'@'localhost'; 

