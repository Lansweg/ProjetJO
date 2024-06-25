
CREATE TABLE Equipe(
        id_equipe     Int  Auto_increment  NOT NULL ,
        nomEquipe     Varchar (255) NOT NULL ,
        paysEquipe    Varchar (255) NOT NULL ,
        couleurEquipe Varchar (255) NOT NULL
	,CONSTRAINT Equipe_PK PRIMARY KEY (id_equipe)
)ENGINE=InnoDB;



CREATE TABLE Rencontre(
        id_rencontre   Int  Auto_increment  NOT NULL ,
        date_rencontre Date NOT NULL ,
        lieu           Varchar (255) NOT NULL ,
        endrencontre   Bool NOT NULL ,
        equipe1        Varchar (255) NOT NULL ,
        equipe2        Varchar (255) NOT NULL ,
        score1         Int NOT NULL ,
        score2         Int NOT NULL ,
        id_equipe      Int
	,CONSTRAINT Rencontre_PK PRIMARY KEY (id_rencontre)

	,CONSTRAINT Rencontre_Equipe_FK FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe)
)ENGINE=InnoDB;



CREATE TABLE Comment(
        id_comment   Int  Auto_increment  NOT NULL ,
        comment      Varchar (255) NOT NULL ,
        id_rencontre Int
	,CONSTRAINT Comment_PK PRIMARY KEY (id_comment)

	,CONSTRAINT Comment_Rencontre_FK FOREIGN KEY (id_rencontre) REFERENCES Rencontre(id_rencontre)
)ENGINE=InnoDB;


CREATE TABLE User(
        id_user      Int  Auto_increment  NOT NULL ,
        nom          Varchar (50) NOT NULL ,
        prenom       Varchar (50) NOT NULL ,
        mailUser     Varchar (50) NOT NULL ,
        password     Varchar (255) NOT NULL ,
        datecreation Date NOT NULL ,
        lastconnect  Date NOT NULL ,
        id_comment   Int
	,CONSTRAINT User_PK PRIMARY KEY (id_user)

	,CONSTRAINT User_Comment_FK FOREIGN KEY (id_comment) REFERENCES Comment(id_comment)
)ENGINE=InnoDB;


CREATE TABLE Visiteur(
        id_visiteur Int  Auto_increment  NOT NULL ,
        ip          Varchar (50) NOT NULL ,
        dateVisite  Date NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT Visiteur_PK PRIMARY KEY (id_visiteur)

	,CONSTRAINT Visiteur_User_FK FOREIGN KEY (id_user) REFERENCES User(id_user)
)ENGINE=InnoDB;


CREATE TABLE Joueur(
        id_joueur    Int  Auto_increment  NOT NULL ,
        nomJoueur    Varchar (50) NOT NULL ,
        prenomJoueur Varchar (50) NOT NULL ,
        posteJoueur  Varchar (50) NOT NULL ,
        Nationalite  Varchar (50) NOT NULL ,
        id_equipe    Int NOT NULL
	,CONSTRAINT Joueur_PK PRIMARY KEY (id_joueur)

	,CONSTRAINT Joueur_Equipe_FK FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe)
)ENGINE=InnoDB;








-- correction gpt 


CREATE TABLE Equipe(
    id_equipe     Int  Auto_increment  NOT NULL,
    nomEquipe     Varchar (255) NOT NULL,
    paysEquipe    Varchar (255) NOT NULL,
    couleurEquipe Varchar (255) NOT NULL,
    CONSTRAINT Equipe_PK PRIMARY KEY (id_equipe)
)ENGINE=InnoDB;

CREATE TABLE Rencontre(
    id_rencontre   Int  Auto_increment  NOT NULL,
    date_rencontre Date NOT NULL,
    lieu           Varchar (255) NOT NULL,
    endrencontre   Bool NOT NULL,
    equipe1        Int NOT NULL,
    equipe2        Int NOT NULL,
    score1         Int NOT NULL,
    score2         Int NOT NULL,
    CONSTRAINT Rencontre_PK PRIMARY KEY (id_rencontre),
    CONSTRAINT Rencontre_Equipe1_FK FOREIGN KEY (equipe1) REFERENCES Equipe(id_equipe),
    CONSTRAINT Rencontre_Equipe2_FK FOREIGN KEY (equipe2) REFERENCES Equipe(id_equipe)
)ENGINE=InnoDB;

CREATE TABLE Comment(
    id_comment   Int  Auto_increment  NOT NULL,
    comment      Varchar (255) NOT NULL,
    id_rencontre Int,
    CONSTRAINT Comment_PK PRIMARY KEY (id_comment),
    CONSTRAINT Comment_Rencontre_FK FOREIGN KEY (id_rencontre) REFERENCES Rencontre(id_rencontre)
)ENGINE=InnoDB;

CREATE TABLE User(
    id_user      Int  Auto_increment  NOT NULL,
    nom          Varchar (50) NOT NULL,
    prenom       Varchar (50) NOT NULL,
    mailUser     Varchar (50) NOT NULL,
    password     Varchar (255) NOT NULL,
    datecreation Date NOT NULL,
    lastconnect  Date NOT NULL,
    id_comment   Int,
    CONSTRAINT User_PK PRIMARY KEY (id_user),
    CONSTRAINT User_Comment_FK FOREIGN KEY (id_comment) REFERENCES Comment(id_comment)
)ENGINE=InnoDB;

CREATE TABLE Visiteur(
    id_visiteur Int  Auto_increment  NOT NULL,
    ip          Varchar (50) NOT NULL,
    dateVisite  Date NOT NULL,
    id_user     Int NOT NULL,
    CONSTRAINT Visiteur_PK PRIMARY KEY (id_visiteur),
    CONSTRAINT Visiteur_User_FK FOREIGN KEY (id_user) REFERENCES User(id_user)
)ENGINE=InnoDB;

CREATE TABLE Joueur(
    id_joueur    Int  Auto_increment  NOT NULL,
    nomJoueur    Varchar (50) NOT NULL,
    prenomJoueur Varchar (50) NOT NULL,
    posteJoueur  Varchar (50) NOT NULL,
    Nationalite  Varchar (50) NOT NULL,
    id_equipe    Int NOT NULL,
    CONSTRAINT Joueur_PK PRIMARY KEY (id_joueur),
    CONSTRAINT Joueur_Equipe_FK FOREIGN KEY (id_equipe) REFERENCES Equipe(id_equipe)
)ENGINE=InnoDB;






-- Insérer des équipes
INSERT INTO Equipe (nomEquipe, paysEquipe, couleurEquipe) VALUES 
('Equipe A', 'France', 'Bleu'),
('Equipe B', 'Espagne', 'Rouge'),
('Equipe C', 'Italie', 'Vert'),
('Equipe D', 'Allemagne', 'Jaune'),
('Equipe E', 'Portugal', 'Noir'),
('Equipe F', 'Brésil', 'Blanc');

-- Insérer des rencontres
INSERT INTO Rencontre (date_rencontre, lieu, endrencontre, equipe1, equipe2, score1, score2) VALUES 
('2024-01-01', 'Stade A', TRUE, 1, 2, 78, 82),
('2024-01-05', 'Stade B', TRUE, 3, 4, 91, 85),
('2024-01-10', 'Stade C', TRUE, 5, 6, 77, 90);

-- Insérer des commentaires
INSERT INTO Comment (comment, id_rencontre) VALUES 
('Très bon match !', 1),
('Match serré jusqu\'à la fin.', 2),
('Belle performance de l\'équipe F.', 3);

-- Insérer des utilisateurs
INSERT INTO User (nom, prenom, mailUser, password, datecreation, lastconnect, id_comment) VALUES 
('Dupont', 'Jean', 'jean.dupont@example.com', 'password123', '2023-01-01', '2024-01-01', 1),
('Martin', 'Marie', 'marie.martin@example.com', 'password123', '2023-02-01', '2024-01-02', 2),
('Bernard', 'Luc', 'luc.bernard@example.com', 'password123', '2023-03-01', '2024-01-03', 3);

-- Insérer des visiteurs
INSERT INTO Visiteur (ip, dateVisite, id_user) VALUES 
('192.168.1.1', '2024-01-01', 1),
('192.168.1.2', '2024-01-02', 2),
('192.168.1.3', '2024-01-03', 3);

-- Insérer des joueurs
INSERT INTO Joueur (nomJoueur, prenomJoueur, posteJoueur, Nationalite, id_equipe) VALUES 
('Durant', 'Kevin', 'Ailier', 'USA', 1),
('James', 'LeBron', 'Ailier', 'USA', 1),
('Curry', 'Stephen', 'Meneur', 'USA', 2),
('Nowitzki', 'Dirk', 'Ailier fort', 'Allemagne', 2),
('Gasol', 'Pau', 'Pivot', 'Espagne', 3),
('Ginobili', 'Manu', 'Arrière', 'Argentine', 3),
('Antetokounmpo', 'Giannis', 'Ailier fort', 'Grèce', 4),
('Jokic', 'Nikola', 'Pivot', 'Serbie', 4),
('Doncic', 'Luka', 'Arrière', 'Slovénie', 5),
('Harden', 'James', 'Arrière', 'USA', 5),
('Gobert', 'Rudy', 'Pivot', 'France', 6),
('Embiid', 'Joel', 'Pivot', 'Cameroun', 6);
