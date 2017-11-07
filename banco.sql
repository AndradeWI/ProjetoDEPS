create database editora;

use editora;


CREATE TABLE editora ( 
id_editora INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
editora VARCHAR(100) NOT NULL);

CREATE TABLE usuario(
  id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(80) NOT NULL,
  email VARCHAR(80) NOT NULL,
  login VARCHAR(30) NOT NULL,
  senha VARCHAR(32) NOT NULL,
  papel VARCHAR(50) NOT NULL,
  fk_id_editora INT NOT NULL,
  CONSTRAINT FOREIGN KEY(fk_id_editora) REFERENCES editora(id_editora));

CREATE TABLE autor (
id_autor INT NOT AUTO_INCREMENT NULL AUTO_INCREMENT,
fk_id_usuario INT NOT NULL,
PRIMARY KEY(id_autor,fk_id_usuario),
FOREIGN KEY(fk_id_usuario) REFERENCES Usuario (id_usuario));

CREATE TABLE avaliador (
id_avaliador INT NOT NULL AUTO_INCREMENT,
fk_id_usuario INT NOT NULL,
PRIMARY KEY(id_avaliador,fk_id_usuario),
FOREIGN KEY(fk_id_usuario) REFERENCES usuario (id_usuario));

CREATE TABLE editor_serie (
id_editor_serie INT NOT NULL AUTO_INCREMENT,
fk_id_usuario INT NOT NULL,
PRIMARY KEY(id_editor_serie,fk_id_usuario),
FOREIGN KEY(fk_id_usuario) REFERENCES usuario (id_usuario));

CREATE TABLE categoria (
id_categoria int NOT NULL AUTO_INCREMENT PRIMARY KEY,
categoria VARCHAR(50));

CREATE TABLE submissao (
id_submissao INT NOT AUTO_INCREMENT NULL PRIMARY KEY,
titulo VARCHAR(50),
data_submissao TIMESTAMP NOT NULL,
status_sub VARCHAR(50),
isb INT NULL,
sinopse TEXT NULL,
arquivo VARCHAR(200)NOT NULL,
disponivel BOOLEAN,
numero_paginas INT NULL,
fk_id_categoria INT NOT NULL,
FOREIGN KEY(fk_id_categoria) REFERENCES categoria (id_categoria));

CREATE TABLE edicao (
id_edicao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
data_edicao TIMESTAMP,
observacao VARCHAR (200),
status_pendencia VARCHAR(20),
fk_id_submissao INT NOT NULL,
fk_id_editor INT NOT NULL,
fk_id_usuario INT NOT NULL,
FOREIGN KEY(fk_id_editor, fk_id_usuario) REFERENCES editor_serie (fk_id_editor,fk_id_usuario),
FOREIGN KEY(fk_id_submissao) REFERENCES submissao (fk_id_submissao));

CREATE TABLE avaliacao (
id_avaliacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
recomendacao VARCHAR(100),
avaliacao TEXT,
nota Float,
data_limite TIMESTAMP,

fk_id_edicao INT NOT NULL,
fk_id_avaliador INT NOT NULL,
fk_id_usuario1 INT NOT NULL,
fk_id_editor INT NOT NULL,
fk_id_usuario2 INT NOT NULL,
    
FOREIGN KEY(fk_id_edicao) REFERENCES edicao (id_edicao),
FOREIGN KEY(fk_id_usuario1, fk_id_avaliador) REFERENCES avaliador (fk_id_usuario, fk_id_avaliador),
FOREIGN KEY(fk_id_editor,fk_id_usuario2) REFERENCES editor_serie (fk_id_editor,fk_id_usuario));


CREATE TABLE outros_autores (
id_outros_autores INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
co_autor BOOLEAN,
nome VARCHAR(80),
e_mail VARCHAR(80),
fk_id_submissao INT NOT NULL,
FOREIGN KEY(fk_id_submissao) REFERENCES submissao (id_submissao));

CREATE TABLE notificacao (
id_notificacao int NOT NULL AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(80),
mensagem TEXT,
data_notificacao TIMESTAMP,
    
fk_emissor_usuario INT NOT NULL,
fk_usuario_receptor INT NOT NULL,

FOREIGN KEY(fk_emissor_usuario) REFERENCES usuario (id_usuario),
FOREIGN KEY(fk_usuario_receptor) REFERENCES usuario (id_usuario));

CREATE TABLE submissao_notificacao (
fk_id_notificacao INT NOT NULL,
fk_id_submissao INT NOT NULL,
PRIMARY KEY(fk_id_notificacao,fk_id_submissao),
FOREIGN KEY(fk_id_notificacao) REFERENCES notificacao (id_notificacao),
FOREIGN KEY(fk_id_submissao) REFERENCES submissao (id_submissao));