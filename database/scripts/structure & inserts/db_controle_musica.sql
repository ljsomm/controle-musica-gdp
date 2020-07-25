CREATE DATABASE db_controle_musica;
USE db_controle_musica;

CREATE TABLE tb_tipo_musica(
sg_tipo_musica CHAR(1) NOT NULL,
nm_tipo_musica VARCHAR(45),
CONSTRAINT pk_tipo_musica
	PRIMARY KEY(sg_tipo_musica)
);

CREATE TABLE tb_tipo_vocal(
cd_tipo_vocal INT NOT NULL,
nm_tipo_vocal VARCHAR(50),
CONSTRAINT pk_tipo_vocal
	PRIMARY KEY(cd_tipo_vocal)
);

CREATE TABLE tb_grau_afinidade(
cd_grau_afinidade INT NOT NULL,
sg_grau_afinidade CHAR(2),
nm_grau_afinidade VARCHAR(50),
ds_grau_afinidade TEXT,
CONSTRAINT pk_grau_afinidade
	PRIMARY KEY(cd_grau_afinidade)
);

CREATE TABLE tb_instrumento(
cd_instrumento INT NOT NULL,
nm_instrumento VARCHAR(255),
CONSTRAINT pk_instrumento
	PRIMARY KEY(cd_instrumento)
);

CREATE TABLE tb_usuario(
cd_usuario INT NOT NULL,
nm_usuario VARCHAR(255),
nm_login VARCHAR(20) NOT NULL UNIQUE,
cd_senha VARCHAR(75) NOT NULL,
CONSTRAINT pk_usuario
	PRIMARY KEY(cd_usuario)
);

CREATE TABLE tb_musico(
cd_musico INT NOT NULL,
nm_musico VARCHAR(255),
CONSTRAINT pk_musico	
	PRIMARY KEY(cd_musico)
);

CREATE TABLE tb_image(
cd_image INT NOT NULL,
ds_caminho TEXT,
cd_usuario INT NOT NULL,
CONSTRAINT pk_image
	PRIMARY KEY(cd_image),
CONSTRAINT fk_image_usuario
	FOREIGN KEY(cd_usuario)
		REFERENCES tb_usuario(cd_usuario)
);

CREATE TABLE tb_posicao(
cd_posicao INT NOT NULL,
cd_musico INT NOT NULL,
cd_instrumento INT NOT NULL,
CONSTRAINT pk_posicao
	PRIMARY KEY(cd_posicao),
CONSTRAINT fk_posicao_musico	
	FOREIGN KEY (cd_musico)
		REFERENCES tb_musico(cd_musico),
CONSTRAINT fk_posicao_instrumento	
	FOREIGN KEY (cd_instrumento)
		REFERENCES tb_instrumento(cd_instrumento)        
);

CREATE TABLE tb_musica(
cd_musica INT NOT NULL,
nm_musica VARCHAR(255),
nm_interprete_principal VARCHAR(255),
ds_referencia TEXT,
cd_grau_afinidade INT NOT NULL,
sg_tipo_musica CHAR(1) NOT NULL,
cd_usuario INT NOT NULL,
CONSTRAINT pk_musica
	PRIMARY KEY (cd_musica),
CONSTRAINT fk_musica_afinidade
	FOREIGN KEY (cd_grau_afinidade)
		REFERENCES tb_grau_afinidade(cd_grau_afinidade),
CONSTRAINT fk_musica_tipo
	FOREIGN KEY (sg_tipo_musica)
		REFERENCES tb_tipo_musica(sg_tipo_musica),
CONSTRAINT fk_musica_usuario
	FOREIGN KEY (cd_usuario)
		REFERENCES tb_usuario(cd_usuario)
);

CREATE TABLE tb_versao(
cd_versao INT NOT NULL,
nm_versao VARCHAR(255),
cd_musica INT NOT NULL,
CONSTRAINT pk_versao	
	PRIMARY KEY (cd_versao),
CONSTRAINT fk_versao_musica
	FOREIGN KEY(cd_musica)
		REFERENCES tb_musica(cd_musica)
);

CREATE TABLE tb_posicao_versao(
cd_versao INT NOT NULL,
cd_posicao INT NOT NULL,
CONSTRAINT fk_versao_posicao
	FOREIGN KEY(cd_posicao)
		REFERENCES tb_posicao(cd_posicao),
CONSTRAINT fk_posicao_versao
	FOREIGN KEY(cd_versao)
		REFERENCES tb_versao(cd_versao)
);

CREATE TABLE tb_musico_vocal(
cd_musico INT NOT NULL,
cd_tipo_vocal INT NOT NULL,
CONSTRAINT fk_musico_vocal
	FOREIGN KEY(cd_tipo_vocal)
		REFERENCES tb_tipo_vocal(cd_tipo_vocal),
CONSTRAINT fk_vocal_musico
	FOREIGN KEY(cd_musico)
		REFERENCES tb_musico(cd_musico)
);
