create database if not exists tarefas;
use tarefas;

CREATE TABLE if not exists item
([
	codigo INT NOT NULL auto_increment,
	nome VARCHAR(100) NOT NULL,
	prazo date NOT NULL,
	primary key (codigo)
);

CREATE USER 'lista'@'localhost' IDENTIFIED BY 'senha123';

GRANT ALL PRIVILEGES ON tarefas.* TO 'lista'@'localhost';

insert INTO item value(null, 'Estudar para a global', '2019-10-2');
insert INTO item value(null, 'Tirar o lixo', '2019-10-8');