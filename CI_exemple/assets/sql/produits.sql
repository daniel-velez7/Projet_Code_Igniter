Create Database market;
-- Use market;

Create Table produits (
    id  INTEGER primary key auto_increment,
    nom varchar(20),
    description varchar(200),
    prix    integer
);

Create Table users (
    id          INTEGER not null primary key auto_increment,
    email       varchar(50),
    password    varchar(60) not null,
    type        varchar (10)
);


Insert into produits (nom, description, prix) values ('tomate', 'Une boule rouge', 15),
                                 ('carrotte', 'Une ligne orange', 5),
                                 ('patate', 'Une boule marron', 20),
                                 ('haricot', 'Une ligne verte', 50),
                                 ('banane', 'Un arc jaune', 2),
                                 ('fraise', 'Un coeur rouge', 45),
                                 ('citron', 'Une ovale jaune', 36),
                                 ('pomme', 'Une boule rouge', 22),
                                 ('poire', 'Une boule jaune', 15),
                                 ('peche', 'Une boule orange', 42),
                                 ('abricot', 'Une boule orange', 58),
                                 ('golden', 'Une boule jaune', 76),
                                 ('ananas', 'Une ovale jaune', 2),
                                 ('citrouille', 'Une boule orange', 10),
                                 ('raisin', 'Une boule violette', 13),
                                 ('cerise', 'Deux boule rouge', 81)