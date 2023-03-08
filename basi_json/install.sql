-- Active: 1677862072887@@127.0.0.1@3306@form_in_php

--indica il Db che userò
USE form_in_php;

--crea la tabella
CREATE TABLE regioni(
    id_regione INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_regione)
);

--elimina la tabella 
DROP TABLE regioni;

--inserimento dati nella tabella
INSERT INTO regioni(nome) VALUES('Abruzzo');

-- svuota la tabella, ma non la elimina
TRUNCATE TABLE regioni;
