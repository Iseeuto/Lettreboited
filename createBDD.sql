
CREATE DATABASE IF NOT EXISTS LettreBoited;
USE LettreBoited;

CREATE TABLE Tag (
    idTag INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE Serie (
    idSerie INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    synopsis VARCHAR(255)
);

CREATE TABLE TagDeSerie (
    idTag INT,
    idSerie INT,
    PRIMARY KEY (idTag, idSerie),
    FOREIGN KEY (idTag) REFERENCES Tag(idTag) ON DELETE CASCADE,
    FOREIGN KEY (idSerie) REFERENCES Serie(idSerie) ON DELETE CASCADE
);


CREATE TABLE Saison (
    idSaison INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    titre VARCHAR(255),
    idSerie INT,
    FOREIGN KEY (idSerie) REFERENCES Serie(idSerie) ON DELETE CASCADE
);


CREATE TABLE Realisateur (
    idRealisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    photo VARCHAR(255)
);


CREATE TABLE Episode (
    idEpisode INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    idRealisateur INT,
    idSaison INT,
    synopsis TEXT,
    duree INT, -- durée en minutes
    FOREIGN KEY (idRealisateur) REFERENCES Realisateur(idRealisateur) ON DELETE SET NULL,
    FOREIGN KEY (idSaison) REFERENCES Saison(idSaison) ON DELETE CASCADE
);

CREATE TABLE Acteur (
    idActeur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    photo VARCHAR(255)
);

CREATE TABLE ActeurDeSaison (
    idActeur INT,
    idSaison INT,
    PRIMARY KEY (idActeur, idSaison),
    FOREIGN KEY (idActeur) REFERENCES Acteur(idActeur) ON DELETE CASCADE,
    FOREIGN KEY (idSaison) REFERENCES Saison(idSaison) ON DELETE CASCADE
);
