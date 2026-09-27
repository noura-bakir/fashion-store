DROP DATABASE IF EXISTS fashion_store;

CREATE DATABASE fashion_store;

USE fashion_store;

-- =========================
-- TABLE PRODUITS
-- =========================

CREATE TABLE produits (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nom VARCHAR(100),

    prix FLOAT,

    image VARCHAR(255),

    categorie VARCHAR(50)

);

-- =========================
-- INSERT PRODUITS
-- =========================

INSERT INTO produits
(nom,prix,image,categorie)

VALUES
('Robe Femme ',2600,'images/image1.webp','Femme'),
('Robe Femme Rouge',2500,'images/image2.jpg','Femme'),
('Robe Femme ',2200,'images/image7.webp','Femme'),
('Robe Femme ',2300,'images/image14.webp','Femme'),

('Costume Homme',1300,'images/image6.webp','Homme'),
('Costume Homme',1500,'images/image69.jpg','Homme'),
('Costume Homme',1400,'images/image70.webp','Homme'),
('Costume Homme',1400,'images/iamge60.webp','Homme'),

('Hijab Fashion',300,'images/image9.webp','Femme'),
('Hijab Fashion',250,'images/image8.jpg','Femme'),
('Hijab Fashion',160,'images/image22.jpg','Femme'),
('Hijab Fashion',120,'images/image23.jpg','Femme'),

('Short Homme',200,'images/image71.webp','Homme'),
('Short Homme',150,'images/image72.webp','Homme'),
('Short Homme',160,'images/image73.webp','Homme'),
('Short Homme',160,'images/image74.jpg','Homme'),

('Pull Femme',200,'images/image40.webp','Femme'),
('Pull Femme',200,'images/image41.webp','Femme'),
('Pull Femme',200,'images/image43.webp','Femme'),
('Pull Femme',200,'images/image30.webp','Femme'),
 

('Chemise Femme',210,'images/image31.webp','Femme'),
('Chemise Femme',210,'images/image36.webp','Femme'),
('Chemise Femme',210,'images/image39.jpg','Femme'),
('Chemise Femme',210,'images/image44.jpg','Femme'),


('Folard femme',120,'images/image61.jpg','Femme'),
('Folard femme',100,'images/image64.jpeg','Femme'),
('Folard islamique',90,'images/image63.webp','Femme'),
('Folard islamique',100,'images/image67.webp','Femme'),



('Chaussure Homme',500,'images/image87.jpg','Homme'),
('Chaussure Homme',500,'images/image83.webp','Homme'),
('Chaussure Homme',500,'images/image89.webp','Homme'),
('Chaussure Homme',500,'images/image90.webp','Homme'),

('talon femme',160,'images/image31.jpg','femme'),
('talon femme',120,'images/image32.webp','femme'),
('talon femme',300,'images/image33.jpg','femme'),
('talon femme',180,'images/image30.jpg','femme'),

('Casquette Homme',120,'images/image92.jpg','Homme'),
('Casquette Homme',120,'images/image91.webp','Homme'),
('Casquette femme',120,'images/image95.jpg','femme'),
('Casquette femme',120,'images/image94.webp','femme'),

('Accessoire Femme',700,'images/image80.webp','Femme'),
('Accessoire Femme',700,'images/image26.webp','Femme'),
('Accessoire Femme',700,'images/image23.webp','Femme'),
('Accessoire Femme',700,'images/iamge78.webp','Femme');
-- =========================
-- TABLE USERS
-- =========================

CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nom VARCHAR(50),

    email VARCHAR(100),

    password VARCHAR(255)

);

-- =========================
-- TABLE COMMANDES
-- =========================

CREATE TABLE commandes (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nom_client VARCHAR(100),

    telephone VARCHAR(30),

    ville VARCHAR(100),

    adresse TEXT,

    total FLOAT,

    date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================
-- TABLE CONTACT
-- =========================

CREATE TABLE contacts (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nom VARCHAR(100),

    email VARCHAR(100),

    message TEXT,

    date_message TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================
-- EXEMPLE COMMANDES
-- =========================

INSERT INTO commandes
(nom_client,telephone,ville,adresse,total)

VALUES

('Ahmed','0611111111','Casablanca','Hay Hassani',780),

('Sara','0622222222','Rabat','Agdal',450),

('Youssef','0633333333','Marrakech','Guéliz',1200);

-- =========================
-- EXEMPLE USERS
-- =========================

INSERT INTO users
(nom,email,password)

VALUES

('admin','admin@gmail.com',
'$2y$10$abcdefghijklmnopqrstuv');
