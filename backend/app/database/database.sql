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

CREATE TABLE IF NOT EXISTS reviews (

    id_review int PRIMARY KEY AUTO_INCREMENT,
    body text not null,
    rating int(10) not null,
    published_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    chauffeurId int not null,
    passagerId int not null,
    FOREIGN KEY (chauffeurId) REFERENCES chauffeurs(chauffeurId)
    FOREIGN KEY (passagerId) REFERENCES passagers(passagerId) 

);

