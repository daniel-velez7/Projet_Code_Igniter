CREATE DATABASE InfoWeb;

CREATE TABLE administrateur (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    telephone           VARCHAR(10),
    email               VARCHAR(50),
    mdp                 VARCHAR(400),
    adresse             VARCHAR(100)
);

CREATE TABLE stagiaire (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    telephone           VARCHAR(10),
    email               VARCHAR(50),
    mdp                 VARCHAR(400),
    adresse             VARCHAR(100)
);

CREATE TABLE formateur (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    cv                  VARCHAR(200),
    photo               VARCHAR(200),
    email               VARCHAR(50),
    mdp               VARCHAR(400)
);

CREATE TABLE intervenant (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    cv                  VARCHAR(200),
    photo               VARCHAR(200),
    email               VARCHAR(50),
    mdp               VARCHAR(400)
);

CREATE TABLE formation (
    id                  INTEGER primary key auto_increment,
    titre               VARCHAR(50),
    description         VARCHAR(400),
    nb_heure            INTEGER,
    date_debut          DATE,
    date_fin            DATE,
    ref_id_admin        INTEGER NOT NULL, FOREIGN KEY(ref_id_admin) REFERENCES administrateur(id)
);

CREATE TABLE projet (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    date_debut          DATE,
    date_fin            DATE,
    ref_id_admin        INTEGER NOT NULL, FOREIGN KEY(ref_id_admin) REFERENCES administrateur(id)
);

CREATE TABLE competence (
    id                      INTEGER primary key auto_increment,
    nom                     VARCHAR(50)
);

CREATE TABLE specialisation (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    ref_id_competence   INTEGER NOT NULL, FOREIGN KEY(ref_id_competence) REFERENCES competence(id)
);

CREATE TABLE participation_formation (
    ref_id_stagiaire      INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES stagiaire(id),
    ref_id_formation      INTEGER NOT NULL, FOREIGN KEY(ref_id_formation) REFERENCES formation(id)
);

CREATE TABLE animation_formation (
    ref_id_formateur      INTEGER NOT NULL, FOREIGN KEY(ref_id_formateur) REFERENCES formateur(id),
    ref_id_formation      INTEGER NOT NULL, FOREIGN KEY(ref_id_formation) REFERENCES formation(id)
);

CREATE TABLE participation_projet (
    ref_id_stagiaire        INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES stagiaire(id),
    ref_id_projet           INTEGER NOT NULL, FOREIGN KEY(ref_id_projet) REFERENCES projet(id)
);

CREATE TABLE animation_projet (
    ref_id_intervenant      INTEGER NOT NULL, FOREIGN KEY(ref_id_intervenant) REFERENCES intervenant(id),
    ref_id_projet           INTEGER NOT NULL, FOREIGN KEY(ref_id_projet) REFERENCES projet(id)
);

CREATE TABLE competence_formateur (
    ref_id_formateur        INTEGER NOT NULL, FOREIGN KEY(ref_id_formateur) REFERENCES formateur(id),
    ref_id_competence       INTEGER NOT NULL, FOREIGN KEY(ref_id_competence) REFERENCES competence(id)
);

CREATE TABLE competence_intervenant (
    ref_id_intervenant      INTEGER NOT NULL, FOREIGN KEY(ref_id_intervenant) REFERENCES intervenant(id),
    ref_id_competence       INTEGER NOT NULL, FOREIGN KEY(ref_id_competence) REFERENCES competence(id)
);

CREATE TABLE specialisation_formateur (
    ref_id_formateur INTEGER NOT NULL, FOREIGN KEY(ref_id_formateur) REFERENCES formateur(id),
    ref_id_specialisation INTEGER NOT NULL, FOREIGN KEY(ref_id_specialisation) REFERENCES specialisation(id)
);

CREATE TABLE specialisation_intervenant (
    ref_id_intervenant INTEGER NOT NULL, FOREIGN KEY(ref_id_intervenant) REFERENCES intervenant(id),
    ref_id_specialisation INTEGER NOT NULL, FOREIGN KEY(ref_id_specialisation) REFERENCES specialisation(id)
);

CREATE TABLE validation_stagiaire_projet (
    ref_id_stagiaire        INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES stagiaire(id),
    ref_id_projet           INTEGER NOT NULL, FOREIGN KEY(ref_id_projet) REFERENCES projet(id),
    motivation              VARCHAR(400) NOT NULL
);

CREATE TABLE validation_stagiaire_formation (
    ref_id_stagiaire        INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES stagiaire(id),
    ref_id_formation        INTEGER NOT NULL, FOREIGN KEY(ref_id_formation) REFERENCES formation(id),
    motivation              VARCHAR(400) NOT NULL
);


INSERT INTO formateur (nom, prenom, cv, photo, email, mdp) VALUES 
('Nicolas', 'plet', './upload/cv_01.pdf', './upload/photo_profils_1.png', 'n.plet78@gmail.com', SHA2('123',256)),
('Pierre', 'tada', './upload/cv_02.pdf', './upload/photo_profils_2.png', 'pipi@gmail.com', SHA2('123',256)),
('Nicole', 'mailinois', './upload/cv_03.pdf', './upload/photo_profils_3.png', 'pupu@gmail.com', SHA2('123',256)),
('Bernard', 'Getto', './upload/cv_04.pdf', './upload/photo_profils_4.png', 'papa@gmail.com', SHA2('123',256)),
('Mélissandre', 'Patate', './upload/cv_05.pdf', './upload/photo_profils_5.png', 'pepe@gmail.com', SHA2('123',256)),
('Maxime', 'Tomate', './upload/cv_06.pdf', './upload/photo_profils_6.png', 'toto@gmail.com', SHA2('123',256)),
('Papa', 'Cerise', './upload/cv_07.pdf', './upload/photo_profils_7.png', 'titi@gmail.com', SHA2('123',256)),
('Moman', 'Pomme', './upload/cv_08.pdf', './upload/photo_profils_8.png', 'tata@gmail.com', SHA2('123',256)),
('Actique', 'Patate', './upload/cv_09.pdf', './upload/photo_profils_9.png', 'tete@gmail.com', SHA2('123',256)),
('Richard', 'Aloise', './upload/cv_10.pdf', './upload/photo_profils_10.png', 'momo@gmail.com', SHA2('123',256)),
('Melanie', 'Enter', './upload/cv_01.pdf', './upload/photo_profils_11.png', 'mama@gmail.com', SHA2('123',256)),
('Vincent', 'Exit', './upload/cv_02.pdf', './upload/photo_profils_12.png', 'meme@gmail.com', SHA2('123',256)),
('Maxime', 'Pocage', './upload/cv_03.pdf', './upload/photo_profils_13.png', 'mimi@gmail.com', SHA2('123',256)),
('Pierrot', 'Potage', './upload/cv_04.pdf', './upload/photo_profils_14.png', 'vivi@gmail.com', SHA2('123',256)),
('Nadia', 'Pridge', './upload/cv_05.pdf', './upload/photo_profils_15.png', 'vovo@gmail.com', SHA2('123',256)),
('Coralie', 'Smith', './upload/cv_06.pdf', './upload/photo_profils_16.png', 'vava@gmail.com', SHA2('123',256)),
('Corantin', 'Loca', './upload/cv_07.pdf', './upload/photo_profils_17.png', 'veve@gmail.com', SHA2('123',256)),
('Madelaine', 'Amibo', './upload/cv_08.pdf', './upload/photo_profils_18.png', 'lala@gmail.com', SHA2('123',256)),
('Pierre', 'Tapis', './upload/cv_09.pdf', './upload/photo_profils_1.png', 'lili@gmail.com', SHA2('123',256)),
('Alice', 'Maka', './upload/cv_10.pdf', './upload/photo_profils_2.png', 'lolo@gmail.com', SHA2('123',256)),
('Frodon', 'Saker', './upload/cv_01.pdf', './upload/photo_profils_3.png', 'lele@gmail.com', SHA2('123',256));

INSERT INTO intervenant (nom, prenom, cv, photo, email, mdp) VALUES 
('Nicolas', 'plet', './upload/cv_01.pdf', './upload/photo_profils_1.png', 'n.plet78@gmail.com', SHA2('123',256)),
('Pierre', 'tada', './upload/cv_02.pdf', './upload/photo_profils_2.png', 'pipi@gmail.com', SHA2('123',256)),
('Nicole', 'mailinois', './upload/cv_03.pdf', './upload/photo_profils_3.png', 'pupu@gmail.com', SHA2('123',256)),
('Bernard', 'Getto', './upload/cv_04.pdf', './upload/photo_profils_4.png', 'papa@gmail.com', SHA2('123',256)),
('Mélissandre', 'Patate', './upload/cv_05.pdf', './upload/photo_profils_5.png', 'pepe@gmail.com', SHA2('123',256)),
('Maxime', 'Tomate', './upload/cv_06.pdf', './upload/photo_profils_6.png', 'toto@gmail.com', SHA2('123',256)),
('Papa', 'Cerise', './upload/cv_07.pdf', './upload/photo_profils_7.png', 'titi@gmail.com', SHA2('123',256)),
('Moman', 'Pomme', './upload/cv_08.pdf', './upload/photo_profils_8.png', 'tata@gmail.com', SHA2('123',256)),
('Actique', 'Patate', './upload/cv_09.pdf', './upload/photo_profils_9.png', 'tete@gmail.com', SHA2('123',256)),
('Richard', 'Aloise', './upload/cv_10.pdf', './upload/photo_profils_10.png', 'momo@gmail.com', SHA2('123',256)),
('Melanie', 'Enter', './upload/cv_01.pdf', './upload/photo_profils_11.png', 'mama@gmail.com', SHA2('123',256)),
('Vincent', 'Exit', './upload/cv_02.pdf', './upload/photo_profils_12.png', 'meme@gmail.com', SHA2('123',256)),
('Maxime', 'Pocage', './upload/cv_03.pdf', './upload/photo_profils_13.png', 'mimi@gmail.com', SHA2('123',256)),
('Pierrot', 'Potage', './upload/cv_04.pdf', './upload/photo_profils_14.png', 'vivi@gmail.com', SHA2('123',256)),
('Nadia', 'Pridge', './upload/cv_05.pdf', './upload/photo_profils_15.png', 'vovo@gmail.com', SHA2('123',256)),
('Coralie', 'Smith', './upload/cv_06.pdf', './upload/photo_profils_16.png', 'vava@gmail.com', SHA2('123',256)),
('Corantin', 'Loca', './upload/cv_07.pdf', './upload/photo_profils_17.png', 'veve@gmail.com', SHA2('123',256)),
('Madelaine', 'Amibo', './upload/cv_08.pdf', './upload/photo_profils_18.png', 'lala@gmail.com', SHA2('123',256)),
('Pierre', 'Tapis', './upload/cv_09.pdf', './upload/photo_profils_1.png', 'lili@gmail.com', SHA2('123',256)),
('Alice', 'Maka', './upload/cv_10.pdf', './upload/photo_profils_2.png', 'lolo@gmail.com', SHA2('123',256)),
('Frodon', 'Saker', './upload/cv_01.pdf', './upload/photo_profils_3.png', 'lele@gmail.com', SHA2('123',256));

INSERT INTO stagiaire (nom, prenom, telephone, email, mdp, adresse) VALUES 
('Nicolas', 'plet', '0672812247', 'n.plet78@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Pierre', 'tada', '0672812247', 'pipi@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Nicole', 'mailinois', '0672812247', 'pupu@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Bernard', 'Getto', '0672812247', 'papa@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Mélissandre', 'Patate', '0672812247', 'pepe@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Maxime', 'Tomate', '0672812247', 'toto@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Papa', 'Cerise', '0672812247', 'titi@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Moman', 'Pomme', '0672812247', 'tata@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Actique', 'Patate', '0672812247', 'tete@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Richard', 'Aloise', '0672812247', 'momo@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Melanie', 'Enter', '0672812247', 'mama@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Vincent', 'Exit', '0672812247', 'meme@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Maxime', 'Pocage', '0672812247', 'mimi@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Pierrot', 'Potage', '0672812247', 'vivi@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Nadia', 'Pridge', '0672812247', 'vovo@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Coralie', 'Smith', '0672812247', 'vava@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Corantin', 'Loca', '0672812247', 'veve@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Madelaine', 'Amibo', '0672812247', 'lala@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Pierre', 'Tapis', '0672812247', 'lili@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Alice', 'Maka', '0672812247', 'lolo@gmail.com', SHA2('123',256), '15 rue de la foirfouille'),
('Frodon', 'Saker', '0672812247', 'lele@gmail.com', SHA2('123',256), '15 rue de la foirfouille');


INSERT INTO administrateur (id, nom, prenom, telephone, email, mdp, adresse) VALUES 
(1, 'Nicolas', 'plet', '0672812247', 'n.plet78@gmail.com', SHA2('123',256), '15 rue de la foirfouille');


INSERT INTO projet (nom, date_debut, date_fin, ref_id_admin) VALUES 
('Javascript', '2021-09-09', '2021-09-12', 1),
('PHP', '2021-09-09', '2021-09-12', 1),
('AJAX', '2021-09-09', '2021-09-12', 1),
('HTML', '2021-09-09', '2021-09-12', 1),
('CSS', '2021-09-09', '2021-09-12', 1);


INSERT INTO formation (titre, description, nb_heure, date_debut, date_fin, ref_id_admin) VALUES 
('Exercices Javascript', 'Le langage magique', '75','2021-09-09', '2021-09-12', 1),
('Exercices PHP', 'Le coté serveur', '25', '2021-09-09', '2021-09-12', 1),
('Exercices AJAX', 'La magie opère !', '10', '2021-09-09', '2021-09-12', 1),
('Exercices HTML', 'Kalikoukou', '45', '2021-09-09', '2021-09-12', 1),
('Exercices CSS', 'La Forme les amis ?', '56', '2021-09-09', '2021-09-12', 1);