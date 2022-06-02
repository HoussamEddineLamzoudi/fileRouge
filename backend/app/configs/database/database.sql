CREATE DATABASE IF NOT EXISTS diniM3ak_db;

use diniM3ak_db;

CREATE TABLE IF NOT EXISTS chauffeurs(
    userId int PRIMARY KEY AUTO_INCREMENT,
    prenom varchar(50) not null,
    nom varchar(50) not null,
    userName varchar(50) not null,
    email varchar(50) not null unique,
    motPasse varchar(255) not null,
    hasCar varchar(10) not null,
    img varchar(255)
);

CREATE TABLE IF NOT EXISTS passagers(
    userId int PRIMARY KEY AUTO_INCREMENT,
    prenom varchar(50) not null,
    nom varchar(50) not null,
    userName varchar(50) not null,
    email varchar(50) not null unique,
    motPasse varchar(255) not null,
    hasCar varchar(10) not null,
    img varchar(255)
);

CREATE TABLE IF NOT EXISTS archives(
    id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(50) not null
);

INSERT INTO chauffeurs (prenom, nom, userName, email, motPasse, hasCar) VALUES ('amine', 'mesbahi', 'amine mesbahi', 'amine@gmail.com', '123', 'true');