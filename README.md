# projetMusic
Création d'un site de réservation de cours de music

## Première Maquette :

![image](https://user-images.githubusercontent.com/82157014/206127800-bcda31d2-5794-4725-a68f-44ab0f41b996.png)

## Premier MCD :

  ![image](https://user-images.githubusercontent.com/82157014/206128912-7b1f4d49-dd7c-4b6a-b516-af567dae6ec8.png)
  
## Preier SQL
CREATE TABLE PROF(
   Id_Prof INT AUTO_INCREMENT,
   NOM VARCHAR(50) NOT NULL,
   PRENOM VARCHAR(50) NOT NULL,
   DESCRIPTION VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_Prof)
);

CREATE TABLE UTILISATEUR(
   Id_utilisateur INT AUTO_INCREMENT,
   NOM VARCHAR(50) NOT NULL,
   ADRESSE VARCHAR(50) NOT NULL,
   MDP VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_utilisateur)
);

CREATE TABLE INSTRUMENT(
   Id_instrument INT AUTO_INCREMENT,
   NOM_INSTRU VARCHAR(50) NOT NULL,
   FAMILLE VARCHAR(50) NOT NULL,
   PRIMARY KEY(Id_instrument)
);

CREATE TABLE DISPONIBILITE(
   Id_disponibilite INT AUTO_INCREMENT,
   JOUR VARCHAR(50) NOT NULL,
   MATIN BOOLEAN NOT NULL,
   APRESMIDI BOOLEAN NOT NULL,
   PRIMARY KEY(Id_disponibilite)
);

CREATE TABLE COURS(
   Id_cours INT AUTO_INCREMENT,
   MATIN BOOLEAN NOT NULL,
   APRES_MIDI BOOLEAN NOT NULL,
   _DATE DATETIME NOT NULL,
   DUREE INT NOT NULL CHECK (duree = 1 ) OR (duree = 2),
   DESCRIPTION_C VARCHAR(50) NOT NULL,
   Id_Prof INT NOT NULL,
   Id_utilisateur INT NOT NULL,
   PRIMARY KEY(Id_cours),
   FOREIGN KEY(Id_Prof) REFERENCES PROF(Id_Prof),
   FOREIGN KEY(Id_utilisateur) REFERENCES UTILISATEUR(Id_utilisateur)
);

CREATE TABLE POSSEDE(
   Id_Prof INT,
   Id_instrument INT,
   PRIMARY KEY(Id_Prof, Id_instrument),
   FOREIGN KEY(Id_Prof) REFERENCES PROF(Id_Prof),
   FOREIGN KEY(Id_instrument) REFERENCES INSTRUMENT(Id_instrument)
);

CREATE TABLE DISPO(
   Id_Prof INT,
   Id_disponibilite INT,
   PRIMARY KEY(Id_Prof, Id_disponibilite),
   FOREIGN KEY(Id_Prof) REFERENCES PROF(Id_Prof),
   FOREIGN KEY(Id_disponibilite) REFERENCES DISPONIBILITE(Id_disponibilite)
);
