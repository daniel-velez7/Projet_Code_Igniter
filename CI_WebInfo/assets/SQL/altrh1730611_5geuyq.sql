CREATE DATABASE altrh1730611_5geuyq;

CREATE TABLE p3_g1_administrateur (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    telephone           VARCHAR(10),
    email               VARCHAR(50),
    mdp                 VARCHAR(400),
    adresse             VARCHAR(100)
);

CREATE TABLE p3_g1_stagiaire (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    telephone           VARCHAR(10),
    email               VARCHAR(50),
    mdp                 VARCHAR(400),
    adresse             VARCHAR(100)
);

CREATE TABLE p3_g1_formateur (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    cv                  VARCHAR(200),
    photo               VARCHAR(200),
    email               VARCHAR(50),
    mdp               VARCHAR(400)
);

CREATE TABLE p3_g1_intervenant (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    prenom              VARCHAR(50),
    cv                  VARCHAR(200),
    photo               VARCHAR(200),
    email               VARCHAR(50),
    mdp               VARCHAR(400)
);

CREATE TABLE p3_g1_formation (
    id                  INTEGER primary key auto_increment,
    titre               VARCHAR(50),
    description         VARCHAR(400),
    nb_heure            INTEGER,
    date_debut          DATE,
    date_fin            DATE,
    ref_id_admin        INTEGER NOT NULL, FOREIGN KEY(ref_id_admin) REFERENCES p3_g1_administrateur(id)
);

CREATE TABLE p3_g1_projet (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    date_debut          DATE,
    date_fin            DATE,
    ref_id_admin        INTEGER NOT NULL, FOREIGN KEY(ref_id_admin) REFERENCES p3_g1_administrateur(id)
);

CREATE TABLE p3_g1_competence (
    id                      INTEGER primary key auto_increment,
    nom                     VARCHAR(50)
);

CREATE TABLE p3_g1_specialisation (
    id                  INTEGER primary key auto_increment,
    nom                 VARCHAR(50),
    ref_id_competence   INTEGER NOT NULL, FOREIGN KEY(ref_id_competence) REFERENCES p3_g1_competence(id)
);

CREATE TABLE p3_g1_participation_formation (
    ref_id_stagiaire      INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES p3_g1_stagiaire(id),
    ref_id_formation      INTEGER NOT NULL, FOREIGN KEY(ref_id_formation) REFERENCES p3_g1_formation(id)
);

CREATE TABLE p3_g1_animation_formation (
    ref_id_formateur      INTEGER NOT NULL, FOREIGN KEY(ref_id_formateur) REFERENCES p3_g1_formateur(id),
    ref_id_formation      INTEGER NOT NULL, FOREIGN KEY(ref_id_formation) REFERENCES p3_g1_formation(id)
);

CREATE TABLE p3_g1_participation_projet (
    ref_id_stagiaire        INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES p3_g1_stagiaire(id),
    ref_id_projet           INTEGER NOT NULL, FOREIGN KEY(ref_id_projet) REFERENCES p3_g1_projet(id)
);

CREATE TABLE p3_g1_animation_projet (
    ref_id_intervenant      INTEGER NOT NULL, FOREIGN KEY(ref_id_intervenant) REFERENCES p3_g1_intervenant(id),
    ref_id_projet           INTEGER NOT NULL, FOREIGN KEY(ref_id_projet) REFERENCES p3_g1_projet(id)
);

CREATE TABLE p3_g1_competence_formateur (
    ref_id_formateur        INTEGER NOT NULL, FOREIGN KEY(ref_id_formateur) REFERENCES p3_g1_formateur(id),
    ref_id_competence       INTEGER NOT NULL, FOREIGN KEY(ref_id_competence) REFERENCES p3_g1_competence(id)
);

CREATE TABLE p3_g1_competence_intervenant (
    ref_id_intervenant      INTEGER NOT NULL, FOREIGN KEY(ref_id_intervenant) REFERENCES p3_g1_intervenant(id),
    ref_id_competence       INTEGER NOT NULL, FOREIGN KEY(ref_id_competence) REFERENCES p3_g1_competence(id)
);

CREATE TABLE p3_g1_specialisation_formateur (
    ref_id_formateur INTEGER NOT NULL, FOREIGN KEY(ref_id_formateur) REFERENCES p3_g1_formateur(id),
    ref_id_specialisation INTEGER NOT NULL, FOREIGN KEY(ref_id_specialisation) REFERENCES p3_g1_specialisation(id)
);

CREATE TABLE p3_g1_specialisation_intervenant (
    ref_id_intervenant INTEGER NOT NULL, FOREIGN KEY(ref_id_intervenant) REFERENCES p3_g1_intervenant(id),
    ref_id_specialisation INTEGER NOT NULL, FOREIGN KEY(ref_id_specialisation) REFERENCES p3_g1_specialisation(id)
);

CREATE TABLE p3_g1_validation_stagiaire_projet (
    ref_id_stagiaire        INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES p3_g1_stagiaire(id),
    ref_id_projet           INTEGER NOT NULL, FOREIGN KEY(ref_id_projet) REFERENCES p3_g1_projet(id),
    motivation              VARCHAR(400) NOT NULL
);

CREATE TABLE p3_g1_validation_stagiaire_formation (
    ref_id_stagiaire        INTEGER NOT NULL, FOREIGN KEY(ref_id_stagiaire) REFERENCES p3_g1_stagiaire(id),
    ref_id_formation        INTEGER NOT NULL, FOREIGN KEY(ref_id_formation) REFERENCES p3_g1_formation(id),
    motivation              VARCHAR(400) NOT NULL
);


INSERT INTO p3_g1_formateur (nom, prenom, cv, photo, email, mdp) VALUES 
('Nicolas', 'plet', 'assets/upload/cv_01.pdf', 'assets/upload/photo_profils_1.png', 'n.plet78@gmail.com', MD5('123')),
('Pierre', 'tada', 'assets/upload/cv_02.pdf', 'assets/upload/photo_profils_2.png', 'pipi@gmail.com', MD5('123')),
('Nicole', 'mailinois', 'assets/upload/cv_03.pdf', 'assets/upload/photo_profils_3.png', 'pupu@gmail.com', MD5('123')),
('Bernard', 'Getto', 'assets/upload/cv_04.pdf', 'assets/upload/photo_profils_4.png', 'papa@gmail.com', MD5('123')),
('Mélissandre', 'Patate', 'assets/upload/cv_05.pdf', 'assets/upload/photo_profils_5.png', 'pepe@gmail.com', MD5('123')),
('Maxime', 'Tomate', 'assets/upload/cv_06.pdf', 'assets/upload/photo_profils_6.png', 'toto@gmail.com', MD5('123')),
('Papa', 'Cerise', 'assets/upload/cv_07.pdf', 'assets/upload/photo_profils_7.png', 'titi@gmail.com', MD5('123')),
('Moman', 'Pomme', 'assets/upload/cv_08.pdf', 'assets/upload/photo_profils_8.png', 'tata@gmail.com', MD5('123')),
('Actique', 'Patate', 'assets/upload/cv_09.pdf', 'assets/upload/photo_profils_9.png', 'tete@gmail.com', MD5('123')),
('Richard', 'Aloise', 'assets/upload/cv_10.pdf', 'assets/upload/photo_profils_10.png', 'momo@gmail.com', MD5('123')),
('Melanie', 'Enter', 'assets/upload/cv_01.pdf', 'assets/upload/photo_profils_11.png', 'mama@gmail.com', MD5('123')),
('Vincent', 'Exit', 'assets/upload/cv_02.pdf', 'assets/upload/photo_profils_12.png', 'meme@gmail.com', MD5('123')),
('Maxime', 'Pocage', 'assets/upload/cv_03.pdf', 'assets/upload/photo_profils_13.png', 'mimi@gmail.com', MD5('123')),
('Pierrot', 'Potage', 'assets/upload/cv_04.pdf', 'assets/upload/photo_profils_14.png', 'vivi@gmail.com', MD5('123')),
('Nadia', 'Pridge', 'assets/upload/cv_05.pdf', 'assets/upload/photo_profils_15.png', 'vovo@gmail.com', MD5('123')),
('Coralie', 'Smith', 'assets/upload/cv_06.pdf', 'assets/upload/photo_profils_16.png', 'vava@gmail.com', MD5('123')),
('Corantin', 'Loca', 'assets/upload/cv_07.pdf', 'assets/upload/photo_profils_17.png', 'veve@gmail.com', MD5('123')),
('Madelaine', 'Amibo', 'assets/upload/cv_08.pdf', 'assets/upload/photo_profils_18.png', 'lala@gmail.com', MD5('123')),
('Pierre', 'Tapis', 'assets/upload/cv_09.pdf', 'assets/upload/photo_profils_1.png', 'lili@gmail.com', MD5('123')),
('Alice', 'Maka', 'assets/upload/cv_10.pdf', 'assets/upload/photo_profils_2.png', 'lolo@gmail.com', MD5('123')),
('Frodon', 'Saker', 'assets/upload/cv_01.pdf', 'assets/upload/photo_profils_3.png', 'lele@gmail.com', MD5('123'));

INSERT INTO p3_g1_intervenant (nom, prenom, cv, photo, email, mdp) VALUES 
('Nicolas', 'plet', 'assets/upload/cv_01.pdf', 'assets/upload/photo_profils_1.png', 'n.plet78@gmail.com', MD5('123')),
('Pierre', 'tada', 'assets/upload/cv_02.pdf', 'assets/upload/photo_profils_2.png', 'pipi@gmail.com', MD5('123')),
('Nicole', 'mailinois', 'assets/upload/cv_03.pdf', 'assets/upload/photo_profils_3.png', 'pupu@gmail.com', MD5('123')),
('Bernard', 'Getto', 'assets/upload/cv_04.pdf', 'assets/upload/photo_profils_4.png', 'papa@gmail.com', MD5('123')),
('Mélissandre', 'Patate', 'assets/upload/cv_05.pdf', 'assets/upload/photo_profils_5.png', 'pepe@gmail.com', MD5('123')),
('Maxime', 'Tomate', 'assets/upload/cv_06.pdf', 'assets/upload/photo_profils_6.png', 'toto@gmail.com', MD5('123')),
('Papa', 'Cerise', 'assets/upload/cv_07.pdf', 'assets/upload/photo_profils_7.png', 'titi@gmail.com', MD5('123')),
('Moman', 'Pomme', 'assets/upload/cv_08.pdf', 'assets/upload/photo_profils_8.png', 'tata@gmail.com', MD5('123')),
('Actique', 'Patate', 'assets/upload/cv_09.pdf', 'assets/upload/photo_profils_9.png', 'tete@gmail.com', MD5('123')),
('Richard', 'Aloise', 'assets/upload/cv_10.pdf', 'assets/upload/photo_profils_10.png', 'momo@gmail.com', MD5('123')),
('Melanie', 'Enter', 'assets/upload/cv_01.pdf', 'assets/upload/photo_profils_11.png', 'mama@gmail.com', MD5('123')),
('Vincent', 'Exit', 'assets/upload/cv_02.pdf', 'assets/upload/photo_profils_12.png', 'meme@gmail.com', MD5('123')),
('Maxime', 'Pocage', 'assets/upload/cv_03.pdf', 'assets/upload/photo_profils_13.png', 'mimi@gmail.com', MD5('123')),
('Pierrot', 'Potage', 'assets/upload/cv_04.pdf', 'assets/upload/photo_profils_14.png', 'vivi@gmail.com', MD5('123')),
('Nadia', 'Pridge', 'assets/upload/cv_05.pdf', 'assets/upload/photo_profils_15.png', 'vovo@gmail.com', MD5('123')),
('Coralie', 'Smith', 'assets/upload/cv_06.pdf', 'assets/upload/photo_profils_16.png', 'vava@gmail.com', MD5('123')),
('Corantin', 'Loca', 'assets/upload/cv_07.pdf', 'assets/upload/photo_profils_17.png', 'veve@gmail.com', MD5('123')),
('Madelaine', 'Amibo', 'assets/upload/cv_08.pdf', 'assets/upload/photo_profils_18.png', 'lala@gmail.com', MD5('123')),
('Pierre', 'Tapis', 'assets/upload/cv_09.pdf', 'assets/upload/photo_profils_1.png', 'lili@gmail.com', MD5('123')),
('Alice', 'Maka', 'assets/upload/cv_10.pdf', 'assets/upload/photo_profils_2.png', 'lolo@gmail.com', MD5('123')),
('Frodon', 'Saker', 'assets/upload/cv_01.pdf', 'assets/upload/photo_profils_3.png', 'lele@gmail.com', MD5('123'));

INSERT INTO p3_g1_stagiaire (nom, prenom, telephone, email, mdp, adresse) VALUES 
('Nicolas', 'plet', '0672812247', 'n.plet78@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Pierre', 'tada', '0672812247', 'pipi@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Nicole', 'mailinois', '0672812247', 'pupu@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Bernard', 'Getto', '0672812247', 'papa@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Mélissandre', 'Patate', '0672812247', 'pepe@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Maxime', 'Tomate', '0672812247', 'toto@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Papa', 'Cerise', '0672812247', 'titi@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Moman', 'Pomme', '0672812247', 'tata@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Actique', 'Patate', '0672812247', 'tete@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Richard', 'Aloise', '0672812247', 'momo@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Melanie', 'Enter', '0672812247', 'mama@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Vincent', 'Exit', '0672812247', 'meme@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Maxime', 'Pocage', '0672812247', 'mimi@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Pierrot', 'Potage', '0672812247', 'vivi@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Nadia', 'Pridge', '0672812247', 'vovo@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Coralie', 'Smith', '0672812247', 'vava@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Corantin', 'Loca', '0672812247', 'veve@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Madelaine', 'Amibo', '0672812247', 'lala@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Pierre', 'Tapis', '0672812247', 'lili@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Alice', 'Maka', '0672812247', 'lolo@gmail.com', MD5('123'), '15 rue de la foirfouille'),
('Frodon', 'Saker', '0672812247', 'lele@gmail.com', MD5('123'), '15 rue de la foirfouille');


INSERT INTO p3_g1_administrateur (id, nom, prenom, telephone, email, mdp, adresse) VALUES 
(1, 'Nicolas', 'plet', '0672812247', 'n.plet78@gmail.com', MD5('123'), '15 rue de la foirfouille');


INSERT INTO p3_g1_projet (nom, date_debut, date_fin, ref_id_admin) VALUES 
('Javascript', '2021-09-09', '2021-09-12', 1),
('PHP', '2021-09-09', '2021-09-12', 1),
('AJAX', '2021-09-09', '2021-09-12', 1),
('HTML', '2021-09-09', '2021-09-12', 1),
('CSS', '2021-09-09', '2021-09-12', 1);


INSERT INTO p3_g1_formation (titre, description, nb_heure, date_debut, date_fin, ref_id_admin) VALUES 
('Exercices Javascript', 'Le langage magique', '75','2021-09-09', '2021-09-12', 1),
('Exercices PHP', 'Le coté serveur', '25', '2021-09-09', '2021-09-12', 1),
('Exercices AJAX', 'La magie opère !', '10', '2021-09-09', '2021-09-12', 1),
('Exercices HTML', 'Kalikoukou', '45', '2021-09-09', '2021-09-12', 1),
('Exercices CSS', 'La Forme les amis ?', '56', '2021-09-09', '2021-09-12', 1);

INSERT INTO p3_g1_specialisation (nom, ref_id_competence) VALUES 
('CSS', 1),
('PHP', 2),
('AJAX', 3),
('HTML', 4),
('SCSS', 5);
