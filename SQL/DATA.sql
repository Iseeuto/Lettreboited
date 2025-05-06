-- Insertion des Tags (exemples)
INSERT INTO Tag (nom) VALUES
('Drame'),
('Comédie'),
('Action'),
('Science-Fiction'),
('Policier'),
('Fantasy'),
('Thriller');

INSERT INTO Serie (titre, affiche, synopsis) VALUES
('Breaking Bad', 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/tP2wgZfzkZxL18jImD2YXqEUXQA.jpg', 'Un professeur de chimie se lance dans la fabrication de méthamphétamine après avoir été diagnostiqué d''un cancer en phase terminale.'),
('Malcom', 'https://image.tmdb.org/t/p/original/wN95OS6WD9T4BqA9TNCRATHcmJK.jpg', 'Une comédie familiale centrée sur un jeune garçon surdoué et sa famille excentrique.'),
('The Last Of Us', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/eIQqqWFBtzKFfcxuuemtRNtoIkN.jpg', 'Dans un monde post-apocalyptique, un homme et une jeune fille tentent de survivre à une épidémie de champignons transformant les humains en monstres.'),
('The Mandalorian', 'https://www.themoviedb.org/t/p/w1280/s8lHYTNYM919rDFvMs33tOeMbYf.jpg', 'Un chasseur de primes Mandalorien prend sous sa protection un mystérieux enfant appelé "The Child" dans l''univers de Star Wars.'),
('Narcos', 'https://www.themoviedb.org/t/p/w1280/lE81IZv7mCYxbanB4ibDeivB1qs.jpg', 'L''ascension et la chute du narcotrafiquant colombien Pablo Escobar, et la guerre contre la drogue.'),
('Your Honor', 'https://www.themoviedb.org/t/p/w1280/5NDs12paqvz4Jug3f13fC9XmSVN.jpg', 'Un juge respecté voit sa vie bouleversée après que son fils commet un meurtre accidentel impliquant une famille criminelle.'),
('Game Of Thrones', 'https://www.themoviedb.org/t/p/w1280/3YSdxdhhdCDlMs88RhvjhDLX4CA.jpg', 'Dans un monde médiéval fantastique, des familles nobles luttent pour le contrôle du trône de fer.');

-- Lien entre les séries et les tags
INSERT INTO TagDeSerie (idTag, idSerie) VALUES
-- Breaking Bad (Tags : Drame, Policier, Thriller)
((SELECT idTag FROM Tag WHERE nom = 'Drame'), (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),
((SELECT idTag FROM Tag WHERE nom = 'Policier'), (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),
((SELECT idTag FROM Tag WHERE nom = 'Thriller'), (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),

-- Malcom (Tags : Comédie)
((SELECT idTag FROM Tag WHERE nom = 'Comédie'), (SELECT idSerie FROM Serie WHERE titre = 'Malcom')),

-- The Last Of Us (Tags : Action, Science-Fiction, Thriller)
((SELECT idTag FROM Tag WHERE nom = 'Action'), (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us')),
((SELECT idTag FROM Tag WHERE nom = 'Science-Fiction'), (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us')),
((SELECT idTag FROM Tag WHERE nom = 'Thriller'), (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us')),

-- The Mandalorian (Tags : Action, Science-Fiction, Fantasy)
((SELECT idTag FROM Tag WHERE nom = 'Action'), (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')),
((SELECT idTag FROM Tag WHERE nom = 'Science-Fiction'), (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')),
((SELECT idTag FROM Tag WHERE nom = 'Fantasy'), (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')),

-- Narcos (Tags : Drame, Policier)
((SELECT idTag FROM Tag WHERE nom = 'Drame'), (SELECT idSerie FROM Serie WHERE titre = 'Narcos')),
((SELECT idTag FROM Tag WHERE nom = 'Policier'), (SELECT idSerie FROM Serie WHERE titre = 'Narcos')),

-- Your Honor (Tags : Drame, Thriller)
((SELECT idTag FROM Tag WHERE nom = 'Drame'), (SELECT idSerie FROM Serie WHERE titre = 'Your Honor')),
((SELECT idTag FROM Tag WHERE nom = 'Thriller'), (SELECT idSerie FROM Serie WHERE titre = 'Your Honor')),

-- Game of Thrones (Tags : Drame, Fantasy)
((SELECT idTag FROM Tag WHERE nom = 'Drame'), (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
((SELECT idTag FROM Tag WHERE nom = 'Fantasy'), (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones'));

-- Ajout des saisons pour chaque série

-- Breaking Bad
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),
(2, 'Saison 2', (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),
(3, 'Saison 3', (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),
(4, 'Saison 4', (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')),
(5, 'Saison 5', (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad'));

-- Malcom
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'Malcom')),
(2, 'Saison 2', (SELECT idSerie FROM Serie WHERE titre = 'Malcom')),
(3, 'Saison 3', (SELECT idSerie FROM Serie WHERE titre = 'Malcom')),
(4, 'Saison 4', (SELECT idSerie FROM Serie WHERE titre = 'Malcom')),
(5, 'Saison 5', (SELECT idSerie FROM Serie WHERE titre = 'Malcom'));

-- The Last Of Us
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us'));

-- The Mandalorian
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')),
(2, 'Saison 2', (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')),
(3, 'Saison 3', (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian'));

-- Narcos
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'Narcos')),
(2, 'Saison 2', (SELECT idSerie FROM Serie WHERE titre = 'Narcos')),
(3, 'Saison 3', (SELECT idSerie FROM Serie WHERE titre = 'Narcos'));

-- Your Honor
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'Your Honor'));

-- Game Of Thrones
INSERT INTO Saison (numero, titre, idSerie) VALUES
(1, 'Saison 1', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(2, 'Saison 2', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(3, 'Saison 3', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(4, 'Saison 4', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(5, 'Saison 5', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(6, 'Saison 6', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(7, 'Saison 7', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')),
(8, 'Saison 8', (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones'));


-- Ajout des acteurs (uniquement une fois pour chaque acteur)
INSERT INTO Acteur (nom, photo) VALUES
('Bryan Cranston', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Bryan_Cranston_2023_%28cropped%29.jpg/250px-Bryan_Cranston_2023_%28cropped%29.jpg'),
('Aaron Paul', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Aaron_Paul_SDDC_2019.jpg/330px-Aaron_Paul_SDDC_2019.jpg'),
('Frankie Muniz', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Frankie_muniz_%2852703160866%29_%28cropped%29.jpg/250px-Frankie_muniz_%2852703160866%29_%28cropped%29.jpg'),
('Pedro Pascal', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Pedro_Pascal_at_SXSW_2025_01_%28cropped%29.jpg/250px-Pedro_Pascal_at_SXSW_2025_01_%28cropped%29.jpg'),
('Bella Ramsey', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Bella_Ramsey%2C_actor%2C_at_SXSW_2025_03_%28cropped%29.jpg/250px-Bella_Ramsey%2C_actor%2C_at_SXSW_2025_03_%28cropped%29.jpg'),
('Gina Carano', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Gina_Carano_Photo_Op_GalaxyCon_Richmond_2024.jpg/250px-Gina_Carano_Photo_Op_GalaxyCon_Richmond_2024.jpg'),
('Wagner Moura', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Wagner_Moura_at_Lisbon_Film_Festival_2019.jpg/250px-Wagner_Moura_at_Lisbon_Film_Festival_2019.jpg'),
('Michael Stuhlbarg', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Michael_Stuhlbarg_in_2018_%283%29.jpg/250px-Michael_Stuhlbarg_in_2018_%283%29.jpg'),
('Emilia Clarke', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Emilia_Clarke_Dior_Rose_des_Vents.jpg/250px-Emilia_Clarke_Dior_Rose_des_Vents.jpg'),
('Kit Harington', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Kit_harrington_by_sachyn_mital_%28cropped_2%29.jpg/250px-Kit_harrington_by_sachyn_mital_%28cropped_2%29.jpg');

-- Ajout des acteurs principaux pour chaque série (en évitant les doublons)

-- Breaking Bad
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Bryan Cranston'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Aaron Paul'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')));

-- Malcom
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Frankie Muniz'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Malcom'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Bryan Cranston'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Malcom')));

-- The Last Of Us
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Pedro Pascal'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Bella Ramsey'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us')));

-- The Mandalorian
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Pedro Pascal'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Gina Carano'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')));

-- Narcos
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Wagner Moura'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Narcos'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Pedro Pascal'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Narcos')));

-- Your Honor
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Bryan Cranston'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Your Honor'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Michael Stuhlbarg'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Your Honor')));

-- Game Of Thrones
INSERT INTO ActeurDeSaison (idActeur, idSaison) VALUES
((SELECT idActeur FROM Acteur WHERE nom = 'Emilia Clarke'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones'))),
((SELECT idActeur FROM Acteur WHERE nom = 'Kit Harington'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')));

-- Insertion des réalisateurs
INSERT INTO Realisateur (nom, photo) VALUES
('Vince Gilligan', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Vince_Gilligan_by_Gage_Skidmore_3.jpg/250px-Vince_Gilligan_by_Gage_Skidmore_3.jpg'), -- Réalisateur de Breaking Bad
('Todd Holland', 'https://www.imdb.com/fr-ca/name/nm0390844/mediaviewer/rm2444002817/?ref_=nm_ov_ph'), -- Réalisateur de Malcom
('Craig Mazin', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Craig_Mazin%2C_MovieZine_interview_%28cropped%29.png/330px-Craig_Mazin%2C_MovieZine_interview_%28cropped%29.png'), -- Réalisateur de The Last of Us
('Jon Favreau', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Jon_Favreau_2016.jpeg/250px-Jon_Favreau_2016.jpeg'), -- Réalisateur de The Mandalorian
('Andrés Baiz', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Andr%C3%A9s_Baiz_en_2024.jpg/330px-Andr%C3%A9s_Baiz_en_2024.jpg'), -- Réalisateur de Narcos
('Edward Berger', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Edward_Berger_at_the_2024_Toronto_International_Film_Festival_%28cropped%29.jpg/250px-Edward_Berger_at_the_2024_Toronto_International_Film_Festival_%28cropped%29.jpg'), -- Réalisateur de Your Honor
('David Nutter', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/David_Nutter_by_Gage_Skidmore.jpg/250px-David_Nutter_by_Gage_Skidmore.jpg'); -- Réalisateur de Game of Thrones

-- Episodes pour Breaking Bad (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'Pilot', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Vince Gilligan'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')), 'Walter White, un professeur de chimie, commence à fabriquer de la méthamphétamine.', 58),
(2, 'Cat''s in the Bag...', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Vince Gilligan'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Breaking Bad')), 'Jesse et Walter doivent gérer les conséquences de leur première fabrication de drogue.', 48);

-- Episodes pour Malcom (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'Pilot', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Todd Holland'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Malcom')), 'Malcolm, un enfant surdoué, essaie de gérer sa vie familiale chaotique.', 22),
(2, 'Red Dress', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Todd Holland'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Malcom')), 'Malcolm doit gérer un concours scolaire, tout en étant confronté à la vie avec ses frères et sœurs.', 22);

-- Episodes pour The Last of Us (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'When You''re Lost in the Darkness', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Craig Mazin'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us')), 'Joel et Ellie commencent leur périple dans un monde post-apocalyptique.', 80),
(2, 'Infected', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Craig Mazin'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Last Of Us')), 'Joel et Ellie affrontent un groupe de survivants dans un environnement hostile.', 70);

-- Episodes pour The Mandalorian (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'Chapter 1: The Mandalorian', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Jon Favreau'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')), 'Le Mandalorien accepte une mission risquée pour protéger un mystérieux enfant.', 40),
(2, 'Chapter 2: The Child', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Jon Favreau'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'The Mandalorian')), 'Le Mandalorien prend la décision de protéger l''enfant contre les dangers qui le poursuivent.', 35);

-- Episodes pour Narcos (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'Descenso', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Andrés Baiz'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Narcos')), 'Pablo Escobar commence à construire son empire de la drogue.', 55),
(2, 'The Sword of Simón Bolívar', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Andrés Baiz'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Narcos')), 'La guerre contre les cartels commence à s''intensifier avec l''intervention du gouvernement.', 60);

-- Episodes pour Your Honor (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'Part One', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Edward Berger'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Your Honor')), 'Un juge respecté lutte pour protéger son fils après un accident tragique.', 60),
(2, 'Part Two', (SELECT idRealisateur FROM Realisateur WHERE nom = 'Edward Berger'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Your Honor')), 'Le juge prend une décision qui pourrait bouleverser sa carrière et sa vie.', 58);

-- Episodes pour Game of Thrones (Saison 1)
INSERT INTO Episode (numero, titre, idRealisateur, idSaison, synopsis, duree) VALUES
(1, 'Winter Is Coming', (SELECT idRealisateur FROM Realisateur WHERE nom = 'David Nutter'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')), 'Eddard Stark arrive à King''s Landing pour une mission politique tandis que des événements mystérieux se produisent dans le Nord.', 60),
(2, 'The Kingsroad', (SELECT idRealisateur FROM Realisateur WHERE nom = 'David Nutter'), (SELECT idSaison FROM Saison WHERE numero = 1 AND idSerie = (SELECT idSerie FROM Serie WHERE titre = 'Game Of Thrones')), 'Les membres de la famille Stark se séparent pour leurs propres aventures.', 55);
