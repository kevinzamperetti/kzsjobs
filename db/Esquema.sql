/*---------------USUÁRIOS--------------------*/
CREATE TABLE USUARIOS(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(120) NOT NULL,
    email varchar(120) NOT NULL,
    senha varchar(120) NOT NULL,
    endereco varchar(120) DEFAULT NULL,
    nro_telefone bigint,
    data_nasc date NOT NULL,
    tipo char(1) NOT NULL 								//U=Usuário, E=Empresa, A=Administrador
	);

/*---------------VAGAS-----------------------*/
CREATE TABLE VAGAS(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo varchar(120) NOT NULL,
    descricao text NOT NULL,  							
    empresa_id int,
    tipo varchar(3) NOT NULL,							//EMP=emprego, VOL=voluntario, EST=estágio
    area varchar(3) DEFAULT NULL,						//INF=informatica, CRI=crimonologia, FIS=fisioterapia
	FOREIGN KEY (empresa_id) REFERENCES USUARIOS(id) ON DELETE CASCADE
);

/*---------------CANDIDATURAS----------------*/
CREATE TABLE CANDIDATURAS(
    usuario_id int,
    vaga_id int,
    FOREIGN KEY (usuario_id) REFERENCES USUARIOS(id) ON DELETE CASCADE,
	FOREIGN KEY (vaga_id) REFERENCES VAGAS(id) ON DELETE CASCADE,
	PRIMARY KEY  (usuario_id,vaga_id)
);

/*---------------EXPERIENCIA-----------------------*/
CREATE TABLE EXPERIENCIAS(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    local varchar(120) NOT NULL,
    descricao text NOT NULL,  							
    usuario_id int,
    tipo varchar(3) NOT NULL,							//EMP=emprego, VOL=voluntario, EST=estágio
    FOREIGN KEY (usuario_id) REFERENCES USUARIOS(id) ON DELETE CASCADE
);