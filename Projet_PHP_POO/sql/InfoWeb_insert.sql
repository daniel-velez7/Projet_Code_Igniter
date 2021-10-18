USE infoweb;
TRUNCATE TABLE formateur TRUNCATE TABLE intervenant TRUNCATE TABLE stagiaire TRUNCATE TABLE administrateur TRUNCATE TABLE projet TRUNCATE TABLE formation
INSERT Into formateur (nom, prenom, cv, photo, email, mdp)
Values (
        'Nicolas',
        'plet',
        './upload/cv_01.pdf',
        './upload/photo_profils_1.png',
        'n.plet78@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Pierre',
        'tada',
        './upload/cv_02.pdf',
        './upload/photo_profils_2.png',
        'pipi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Nicole',
        'mailinois',
        './upload/cv_03.pdf',
        './upload/photo_profils_3.png',
        'pupu@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Bernard',
        'Getto',
        './upload/cv_04.pdf',
        './upload/photo_profils_4.png',
        'papa@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Mélissandre',
        'Patate',
        './upload/cv_05.pdf',
        './upload/photo_profils_5.png',
        'pepe@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Maxime',
        'Tomate',
        './upload/cv_06.pdf',
        './upload/photo_profils_6.png',
        'toto@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Papa',
        'Cerise',
        './upload/cv_07.pdf',
        './upload/photo_profils_7.png',
        'titi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Moman',
        'Pomme',
        './upload/cv_08.pdf',
        './upload/photo_profils_8.png',
        'tata@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Actique',
        'Patate',
        './upload/cv_09.pdf',
        './upload/photo_profils_9.png',
        'tete@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Richard',
        'Aloise',
        './upload/cv_10.pdf',
        './upload/photo_profils_10.png',
        'momo@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Melanie',
        'Enter',
        './upload/cv_01.pdf',
        './upload/photo_profils_11.png',
        'mama@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Vincent',
        'Exit',
        './upload/cv_02.pdf',
        './upload/photo_profils_12.png',
        'meme@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Maxime',
        'Pocage',
        './upload/cv_03.pdf',
        './upload/photo_profils_13.png',
        'mimi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Pierrot',
        'Potage',
        './upload/cv_04.pdf',
        './upload/photo_profils_14.png',
        'vivi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Nadia',
        'Pridge',
        './upload/cv_05.pdf',
        './upload/photo_profils_15.png',
        'vovo@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Coralie',
        'Smith',
        './upload/cv_06.pdf',
        './upload/photo_profils_16.png',
        'vava@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Corantin',
        'Loca',
        './upload/cv_07.pdf',
        './upload/photo_profils_17.png',
        'veve@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Madelaine',
        'Amibo',
        './upload/cv_08.pdf',
        './upload/photo_profils_18.png',
        'lala@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Pierre',
        'Tapis',
        './upload/cv_09.pdf',
        './upload/photo_profils_1.png',
        'lili@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Alice',
        'Maka',
        './upload/cv_10.pdf',
        './upload/photo_profils_2.png',
        'lolo@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Frodon',
        'Saker',
        './upload/cv_01.pdf',
        './upload/photo_profils_3.png',
        'lele@gmail.com',
        SHA2('123', 256)
    )
INSERT Into intervenant (nom, prenom, cv, photo, email, mdp)
Values (
        'Nicolas',
        'plet',
        './upload/cv_01.pdf',
        './upload/photo_profils_1.png',
        'n.plet78@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Pierre',
        'tada',
        './upload/cv_02.pdf',
        './upload/photo_profils_2.png',
        'pipi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Nicole',
        'mailinois',
        './upload/cv_03.pdf',
        './upload/photo_profils_3.png',
        'pupu@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Bernard',
        'Getto',
        './upload/cv_04.pdf',
        './upload/photo_profils_4.png',
        'papa@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Mélissandre',
        'Patate',
        './upload/cv_05.pdf',
        './upload/photo_profils_5.png',
        'pepe@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Maxime',
        'Tomate',
        './upload/cv_06.pdf',
        './upload/photo_profils_6.png',
        'toto@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Papa',
        'Cerise',
        './upload/cv_07.pdf',
        './upload/photo_profils_7.png',
        'titi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Moman',
        'Pomme',
        './upload/cv_08.pdf',
        './upload/photo_profils_8.png',
        'tata@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Actique',
        'Patate',
        './upload/cv_09.pdf',
        './upload/photo_profils_9.png',
        'tete@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Richard',
        'Aloise',
        './upload/cv_10.pdf',
        './upload/photo_profils_10.png',
        'momo@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Melanie',
        'Enter',
        './upload/cv_01.pdf',
        './upload/photo_profils_11.png',
        'mama@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Vincent',
        'Exit',
        './upload/cv_02.pdf',
        './upload/photo_profils_12.png',
        'meme@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Maxime',
        'Pocage',
        './upload/cv_03.pdf',
        './upload/photo_profils_13.png',
        'mimi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Pierrot',
        'Potage',
        './upload/cv_04.pdf',
        './upload/photo_profils_14.png',
        'vivi@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Nadia',
        'Pridge',
        './upload/cv_05.pdf',
        './upload/photo_profils_15.png',
        'vovo@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Coralie',
        'Smith',
        './upload/cv_06.pdf',
        './upload/photo_profils_16.png',
        'vava@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Corantin',
        'Loca',
        './upload/cv_07.pdf',
        './upload/photo_profils_17.png',
        'veve@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Madelaine',
        'Amibo',
        './upload/cv_08.pdf',
        './upload/photo_profils_18.png',
        'lala@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Pierre',
        'Tapis',
        './upload/cv_09.pdf',
        './upload/photo_profils_1.png',
        'lili@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Alice',
        'Maka',
        './upload/cv_10.pdf',
        './upload/photo_profils_2.png',
        'lolo@gmail.com',
        SHA2('123', 256)
    ),
    (
        'Frodon',
        'Saker',
        './upload/cv_01.pdf',
        './upload/photo_profils_3.png',
        'lele@gmail.com',
        SHA2('123', 256)
    )
INSERT Into stagiaire (nom, prenom, telephone, email, mdp, adresse)
Values (
        'Nicolas',
        'plet',
        '0672812247',
        'n.plet78@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Pierre',
        'tada',
        '0672812247',
        'pipi@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Nicole',
        'mailinois',
        '0672812247',
        'pupu@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Bernard',
        'Getto',
        '0672812247',
        'papa@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Mélissandre',
        'Patate',
        '0672812247',
        'pepe@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Maxime',
        'Tomate',
        '0672812247',
        'toto@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Papa',
        'Cerise',
        '0672812247',
        'titi@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Moman',
        'Pomme',
        '0672812247',
        'tata@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Actique',
        'Patate',
        '0672812247',
        'tete@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Richard',
        'Aloise',
        '0672812247',
        'momo@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Melanie',
        'Enter',
        '0672812247',
        'mama@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Vincent',
        'Exit',
        '0672812247',
        'meme@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Maxime',
        'Pocage',
        '0672812247',
        'mimi@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Pierrot',
        'Potage',
        '0672812247',
        'vivi@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Nadia',
        'Pridge',
        '0672812247',
        'vovo@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Coralie',
        'Smith',
        '0672812247',
        'vava@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Corantin',
        'Loca',
        '0672812247',
        'veve@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Madelaine',
        'Amibo',
        '0672812247',
        'lala@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Pierre',
        'Tapis',
        '0672812247',
        'lili@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Alice',
        'Maka',
        '0672812247',
        'lolo@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    ),
    (
        'Frodon',
        'Saker',
        '0672812247',
        'lele@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    )
INSERT Into administrateur (id, nom, prenom, telephone, email, mdp, adresse)
Values (
        1,
        'Nicolas',
        'plet',
        '0672812247',
        'n.plet78@gmail.com',
        SHA2('123', 256),
        '15 rue de la foirfouille'
    )
INSERT Into projet (nom, date_debut, date_fin, ref_id_admin)
Values ('Javascript', '2021-09-09', '2021-09-12', 1),
    ('PHP', '2021-09-09', '2021-09-12', 1),
    ('AJAX', '2021-09-09', '2021-09-12', 1),
    ('HTML', '2021-09-09', '2021-09-12', 1),
    ('CSS', '2021-09-09', '2021-09-12', 1)
INSERT Into formation (
        titre,
        description,
        nb_heure,
        date_debut,
        date_fin,
        ref_id_admin
    )
Values (
        'Exercices Javascript',
        'Le langage magique',
        '75',
        '2021-09-09',
        '2021-09-12',
        1
    ),
    (
        'Exercices PHP',
        'Le coté serveur',
        '25',
        '2021-09-09',
        '2021-09-12',
        1
    ),
    (
        'Exercices AJAX',
        'La magie opère !',
        '10',
        '2021-09-09',
        '2021-09-12',
        1
    ),
    (
        'Exercices HTML',
        'Kalikoukou',
        '45',
        '2021-09-09',
        '2021-09-12',
        1
    ),
    (
        'Exercices CSS',
        'La Forme les amis ?',
        '56',
        '2021-09-09',
        '2021-09-12',
        1
    )
SELECT DISTINCT *, comptes.famille_id, famille.idFamille, eleve.famille_id, eleve.cursus_id, cursus.idCursus
FROM comptes
    FULL JOIN (
        Select Distinct *
        from famille
            FULL JOIN (
                Select Distinct *
                from eleve
                    FULL JOIN (
                        Select Distinct *
                        from cursus
                    ) ON eleve.cursus_id = cursus.idCursus
            ) ON famille.idFamille = eleve.famille_id
    ) ON comptes.famille_id = famille.idFamille


SELECT DISTINCT * FROM comptes
    INNER JOIN (SELECT DISTINCT idFamille FROM famille) as IDF
    ON comptes.famille_id = IDF.idFamille
    INNER JOIN (SELECT DISTINCT famille_id, cursus_id FROM eleve) as IDE
    ON IDF.idFamille = IDE.famille_id
    INNER JOIN (SELECT DISTINCT idCursus FROM cursus) as CID
    ON IDE.cursus_id = CID.idCursus

    SELECT DISTINCT * FROM comptes
    JOIN famille 	ON comptes.famille_id = famille.idFamille
    JOIN eleve 	ON famille.idFamille = eleve.famille_id
    JOIN cursus 	ON eleve.cursus_id = cursus.idCursus 