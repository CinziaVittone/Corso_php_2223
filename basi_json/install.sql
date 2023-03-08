-- Active: 1677862072887@@127.0.0.1@3306@form_in_php

----------DATABASE----------
--indica il Db che userò
USE form_in_php;

----------REGIONI----------
--crea la tabella regioni
CREATE TABLE regioni(
    id_regione INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_regione)
);

--elimina la tabella 
DROP TABLE regioni;

--inserimento dati nella tabella
INSERT INTO regioni(nome) VALUES('Abruzzo');

-- svuota la tabella, ma non elimina la struttura
TRUNCATE TABLE regioni;

----------PROVINCE----------
--creo la tabella province
CREATE TABLE province(
    id_provincia INT NOT NULL AUTO_INCREMENT,
    id_regione INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    sigla VARCHAR(3) NOT NULL,
    PRIMARY KEY(id_provincia),
    FOREIGN KEY(id_regione) REFERENCES regioni(id_regione)
);

--elimina la tabella 
DROP TABLE province;

--estraggo i dati che mi servono

--inserimento dati nella tabella

--svuota la tabella, ma non elimina la struttura
TRUNCATE TABLE province;