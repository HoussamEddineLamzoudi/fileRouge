CREATE DATABASE IF NOT EXISTS diniM3ak_db;

use diniM3ak_db;

CREATE TABLE IF NOT EXISTS chauffeurs(

    chauffeurId int PRIMARY KEY AUTO_INCREMENT,
    prenom varchar(50) not null,
    nom varchar(50) not null,
    userName varchar(50) not null,
    email varchar(50) not null unique,
    motPasse varchar(255) not null,
    numTel varchar(20) not null,
    numWhatsapp varchar(20) not null,
    hasCar varchar(10) not null,
    img varchar(255)
);

CREATE TABLE IF NOT EXISTS passagers (

    passagerId int PRIMARY KEY AUTO_INCREMENT,
    prenom varchar(50) not null,
    nom varchar(50) not null,
    userName varchar(50) not null,
    email varchar(50) not null unique,
    motPasse varchar(255) not null,
    numTel varchar(20) not null,
    numWhatsapp varchar(20) not null,
    hasCar varchar(10) not null,
    img varchar(255)
);

CREATE TABLE IF NOT EXISTS archives (

    id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) not null
);

CREATE TABLE IF NOT EXISTS trajets (

    id int PRIMARY KEY AUTO_INCREMENT,
    depart varchar(255) not null,
    arrive varchar(255) not null,
    date_depart date not null,
    heur_depart varchar(255) not null,
    am int not null,
    nbr_passager int(10) not null,
    prix int(10) not null,
    cigarette_autorisee int(10) not null,
    chauffeurId int not null,
    FOREIGN KEY (chauffeurId) REFERENCES chauffeurs(chauffeurId)
);


INSERT INTO chauffeurs (prenom, nom, userName, email, numTel, numWhatsapp, motPasse, hasCar) VALUES ('amine', 'mesbahi', 'amine mesbahi', 'amine@gmail.com','0606100200'? '0606100200', '123', 'true');