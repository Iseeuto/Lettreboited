USE LettreBoited;

-- Tags pour Breaking Bad
INSERT INTO Tag (nom) VALUES ('Drame');
INSERT INTO Tag (nom) VALUES ('Crime');
INSERT INTO Tag (nom) VALUES ('Thriller');

-- Séries
INSERT INTO Serie (titre) VALUES ('Breaking Bad');

-- Association Tag <-> Serie (Breaking Bad)
INSERT INTO TagDeSerie (idTag, idSerie) VALUES (3, 4); -- Drame -> Breaking Bad
INSERT INTO TagDeSerie (idTag, idSerie) VALUES (4, 4); -- Crime -> Breaking Bad
INSERT INTO TagDeSerie (idTag, idSerie) VALUES (5, 4); -- Thriller -> Breaking Bad

-- Réalisateur
INSERT INTO Realisateur (nom, photo) VALUES ('Vince Gilligan', 'vince_gilligan.jpg');

-- Saisons de Breaking Bad
INSERT INTO Saison (numero, titre, idSerie) VALUES (1, 'Saison 1', 4); -- Breaking Bad S1
INSERT INTO Saison (numero, titre, idSerie) VALUES (2, 'Saison 2', 4); -- Breaking Bad S2

-- Épisodes de Breaking Bad
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) 
VALUES (1, 'Pilot', 3, 1, 'Walter White apprend qu\'il a un cancer.', 58);

INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) 
VALUES (2, 'Cat\'s in the Bag...', 3, 1, 'Walter et Jesse doivent se débarrasser d\'un corps.', 48);

INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) 
VALUES (1, 'Seven Thirty-Seven', 3, 2, 'Walter et Jesse s\'inquiètent pour leur vie.', 47);

-- Acteurs de Breaking Bad
INSERT INTO Acteur (nom, photo) VALUES ('Bryan Cranston', 'bryan_cranston.jpg'); -- id 1
INSERT INTO Acteur (nom, photo) VALUES ('Aaron Paul', 'aaron_paul.jpg');         -- id 2

-- Association Acteur <-> Saison (Breaking Bad)
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES (1, 1); -- Bryan Cranston dans BB S1
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES (2, 1); -- Aaron Paul dans BB S1
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES (1, 2); -- Bryan Cranston dans BB S2
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES (2, 2); -- Aaron Paul dans BB S2
