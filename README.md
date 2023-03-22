# projetMusic
Création d'un site de réservation de cours de music

## Première Maquette :

![image](https://user-images.githubusercontent.com/82157014/206127800-bcda31d2-5794-4725-a68f-44ab0f41b996.png)

## Premier MCD :

  ![image](https://user-images.githubusercontent.com/82157014/206128912-7b1f4d49-dd7c-4b6a-b516-af567dae6ec8.png)
  
## Premier SQL
CREATE TABLE prof(
   Id_Prof INT AUTO_INCREMENT,
   nom_P VARCHAR(50) NOT NULL,
   prenom_P VARCHAR(50) NOT NULL,
   description_P VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_Prof)
);

CREATE TABLE utilisateur(
   Id_utilisateur INT AUTO_INCREMENT,
   nom_U VARCHAR(50) NOT NULL,
   adresse_U VARCHAR(50) NOT NULL,
   mdp_U VARCHAR(50) NOT NULL,
   mail_U VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_utilisateur)
);

CREATE TABLE instrument(
   Id_instru INT AUTO_INCREMENT,
   nom_instru VARCHAR(50) NOT NULL,
   famille VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_instru)
);

CREATE TABLE disponibilite(
   Id_disponibilite INT AUTO_INCREMENT,
   jour VARCHAR(50) NOT NULL,
   matin BOOLEAN NOT NULL,
   apres_midi BOOLEAN NOT NULL,
   PRIMARY KEY(Id_disponibilite)
);

CREATE TABLE cours(
   Id_cours INT AUTO_INCREMENT,
   matin BOOLEAN NOT NULL,
   apres_midi BOOLEAN NOT NULL,
   _date DATETIME NOT NULL,
   duree INT NOT NULL CHECK (duree = 1 OR duree = 2),
   description_C VARCHAR(50) NOT NULL,
   Id_Prof INT NOT NULL,
   Id_utilisateur INT NOT NULL,
   PRIMARY KEY(Id_cours),
   FOREIGN KEY(Id_Prof) REFERENCES prof(Id_Prof),
   FOREIGN KEY(Id_utilisateur) REFERENCES utilisateur(Id_utilisateur)
);

CREATE TABLE possede(
   Id_Prof INT ,
   Id_instrument INT,
   PRIMARY KEY(Id_Prof, Id_instrument),
   FOREIGN KEY(Id_Prof) REFERENCES prof(Id_Prof),
   FOREIGN KEY(Id_instru) REFERENCES instrument(Id_instru)
);

CREATE TABLE dispo(
   Id_Prof INT,
   Id_disponibilite INT,
   PRIMARY KEY(Id_Prof, Id_disponibilite),
   FOREIGN KEY(Id_Prof) REFERENCES prof(Id_Prof),
   FOREIGN KEY(Id_disponibilite) REFERENCES disponibilite(Id_disponibilite)
);

Inscertion de données :

INSERT INTO `prof` (`Id_Prof`, `nom_P`, `prenom_P`, `description_P`) VALUES ('1', 'Thibro', 'Commun', 'Prof commun'), ('2', 'Andreas', 'Le rat', 'Un dev web de grand talent (surtout en Javascript)');

INSERT INTO `utilisateur` (`Id_utilisateur`, `nom_U`, `adresse_U`, `mdp_U`, `mail_U`) VALUES
(1, 'Gabriel', 'On finira par savoir', 'mdp', 'gabriel@gmail.com'),
(2, 'Yoann', 'Paris', 'Une personne incroyable', 'yoann@gmail.com'),
(3, 'Philippe', 'Philippine', 'enculer', 'philippe@gmail.com');

INSERT INTO `instrument` (`Id_instru`, `nom_instru`, `famille`) VALUES ('1', 'violon', 'cordes'), ('2', 'guitare', 'cordes'), ('3', 'piano', 'cordes'), ('4', 'flûte', 'vent'), ('5', 'saxophone', 'vent'), ('6', 'trompette', 'vent'), ('7', 'batterie', 'Percussion');

INSERT INTO `cours` (`Id_cours`, `matin`, `apres_midi`, `_date`, `duree`, `description_C`, `Id_Prof`, `Id_utilisateur`) VALUES
(1, 1, 0, '2023-03-25 09:00:00', 2, 'Je veux apprendre le piano', 1, 3),
(2, 0, 1, '2023-04-01 16:00:00', 2, 'Je suis une carpe', 2, 1);

INSERT INTO `possede` (`Id_Prof`, `Id_instru`) VALUES ('2', '4'), ('2', '7'), ('1', '2'), ('2', '3'), ('1', '6'), ('2', '6'), ('1', '5');
