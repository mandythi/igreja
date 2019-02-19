CREATE DATABASE igreja;

USE igreja;

CREATE TABLE usuarios (
	id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50),
    senha VARCHAR(6)
);

CREATE TABLE historia(
	hist_id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    hist_src_img VARCHAR(50),
    hist_titulo VARCHAR(255),
    hist_texto VARCHAR(2000),
    hist_ativo INT(1)
);

CREATE TABLE noticias(
	notic_id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    notic_src_img VARCHAR(50),
    notic_titulo VARCHAR(255),
    notic_texto VARCHAR(2000),
    notic_ativo INT(1)
);
