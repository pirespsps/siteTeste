CREATE DATABASE db_siteDagon;

USE db_siteDagon;

CREATE TABLE tbDisco(
id INT AUTO_INCREMENT,
titulo VARCHAR(255),
path_img VARCHAR(255),

CONSTRAINT pk_tbDisco PRIMARY KEY (id)
);

-- insert 

INSERT INTO tbDisco(titulo, path_img) VALUES ("Storm of the lights bane", "assets/images/discos/stormofthelightsbane.png"); 