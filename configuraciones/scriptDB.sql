CREATE TABLE IF NOT EXISTS acacypacRL;
USE acacypacRL;

CREATE TABLE agencias (
id      int(11) AUTO_INCREMENT NOT NULL,
nombre  VARCHAR(255) NOT NULL,
CONSTRAINT pk_agencias PRIMARY KEY(id),
)ENGINE=InnoDb;

CREATE TABLE profesiones (
id      int(11) AUTO_INCREMENT NOT NULL,
nombre  VARCHAR(255) NOT NULL,
CONSTRAINT pk_profesiones PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE usuarios (
id     int(11) AUTO_INCREMENT NOT NULL,
email  VARCHAR(100) NOT NULL,
clave  VARCHAR(50) NOT NULL,
CONSTRAINT pk_usuarios PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE asociados (
id          int(11) AUTO_INCREMENT NOT NULL,
nombres     varchar(60) NOT NULL,
apellidos   varchar(60) NOT NULL,
direccion   VARCHAR(255) NOT NULL,
fechaNac    DATE,
dui         VARCHAR(10) NOT NULL,
nit         varchar(17) NOT NULL,
telefono    varchar(9),
fechaReg    DATETIME DEFAULT NULL,
profesion_id int(11) not null,
agencia_id   int(11) not null,
CONSTRAINT pk_asociados PRIMARY KEY(id),
CONSTRAINT pk_asociado_profesion FOREIGN KEY (profesion_id) REFERENCES profesiones(id),
CONSTRAINT pk_asociado_agencia FOREIGN KEY (agencia_id) REFERENCES agencias(id)
)ENGINE=InnoDb;


CREATE TABLE historialAsociados (
id              int(11) AUTO_INCREMENT NOT NULL,
campoModificado VARCHAR(100) NOT NULL,
valorAnterior   VARCHAR(100) NOT NULL,
nuevoValor      VARCHAR(100) NOT NULL,
feha            DATETIME DEFAULT NULL,
usuario_id      int(11) not null,
CONSTRAINT pk_historialAsociados PRIMARY KEY(id),
CONSTRAINT pk_historialAsociados_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

insert into agencias(nombre) values("AGENCIA I"),
                                    ("AGENCIA II"),
                                    ("AGENCIA III");

insert into profesiones (nombre) values("Ingeniero en sistemas"),
                                        ("Licenciado en computacion"),
                                        ("Licenciado en Administracion de empresas");

insert into usuarios (email, clave) values("javier@gmail.com", "1234");

