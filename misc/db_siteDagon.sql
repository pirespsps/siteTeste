CREATE DATABASE db_siteDagon;

USE db_siteDagon;

CREATE TABLE tbDisco(
id INT AUTO_INCREMENT,
titulo VARCHAR(255),
banda VARCHAR(255),
ano INT,
path_img VARCHAR(255),

CONSTRAINT pk_tbDisco PRIMARY KEY (id)
);

CREATE TABLE tbTrack(
id INT AUTO_INCREMENT,
nome VARCHAR(255),
disco INT,

CONSTRAINT pk_tbTracktbDisco FOREIGN KEY(disco) REFERENCES tbDisco(id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT pk_tbTrack PRIMARY KEY (id)
);

-- Inserts

INSERT INTO tbDisco(id,titulo,banda,ano,path_img) VALUES (1,"Storm of the lights bane","Dissection",1995,"assets/images/discos/stormofthelightsbane.png");
INSERT INTO tbTrack(nome,disco) VALUES ("At the Fathomless Depths",1),
										("Nights Blood",1),
                                        ("Unhallowed",1),
                                        ("Where Dead Angels Lie",1),
                                        ("Retribuition - Storm of the Lights Bane",1),
                                        ("Thorns of Crimson Death",1),
                                        ("Soulreaper",1),
                                        ("No Dreams Breed in Breathless Sleep",1);
    