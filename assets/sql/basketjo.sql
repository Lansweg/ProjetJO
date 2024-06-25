CREATE TABLE Utilisateur(
        Id_Utilisateurs Int  Auto_increment  NOT NULL ,
        Nom             Varchar (50) NOT NULL ,
        Prenom          Varchar (50) NOT NULL ,
        Email           Varchar (50) NOT NULL ,
        Password        Varchar (255) NOT NULL ,
        Roles           Varchar (50) NOT NULL ,
        dateCreation    Date NOT NULL ,
        lastConnect     Date NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (Id_Utilisateurs)
)ENGINE=InnoDB;
CREATE TABLE Visiteur(
        Id_Visiteurs    Int  Auto_increment  NOT NULL ,
        ip              Varchar (50) NOT NULL ,
        dateVisite      Date NOT NULL ,
        Id_Utilisateurs Int NOT NULL
	,CONSTRAINT Visiteur_PK PRIMARY KEY (Id_Visiteurs)
	,CONSTRAINT Visiteur_Utilisateur_FK FOREIGN KEY (Id_Utilisateurs) REFERENCES Utilisateur(Id_Utilisateurs)
)ENGINE=InnoDB;
CREATE TABLE Joueur(
        Id_Joueurs  Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        prenom      Varchar (50) NOT NULL ,
        poste       Varchar (50) NOT NULL ,
        nationalite Varchar (50) NOT NULL
	,CONSTRAINT Joueur_PK PRIMARY KEY (Id_Joueurs)
)ENGINE=InnoDB;
CREATE TABLE Equipe(
        Id_Equipes  Int  Auto_increment  NOT NULL ,
        nomEquipe   Varchar (50) NOT NULL ,
        paysEquipe  Varchar (50) NOT NULL ,
        couleurLogo Varchar (50) NOT NULL ,
        Id_Joueurs  Int NOT NULL
	,CONSTRAINT Equipe_PK PRIMARY KEY (Id_Equipes)
	,CONSTRAINT Equipe_Joueur_FK FOREIGN KEY (Id_Joueurs) REFERENCES Joueur(Id_Joueurs)
)ENGINE=InnoDB;
CREATE TABLE Rencontre(
        Id_Rencontre      Int  Auto_increment  NOT NULL ,
        dateRencontre     Date NOT NULL ,
        equipeA           Int NOT NULL ,
        equipeB           Int NOT NULL ,
        rencontreTerminer Bool NOT NULL ,
        lieu              Varchar (50) NOT NULL ,
        scoreA            Int NOT NULL ,
        scoreB            Int NOT NULL ,
        Id_Equipes        Int NOT NULL ,
        Id_Utilisateurs   Int NOT NULL
	,CONSTRAINT Rencontre_PK PRIMARY KEY (Id_Rencontre)
	,CONSTRAINT Rencontre_Equipe_FK FOREIGN KEY (Id_Equipes) REFERENCES Equipe(Id_Equipes)
	,CONSTRAINT Rencontre_Utilisateur0_FK FOREIGN KEY (Id_Utilisateurs) REFERENCES Utilisateur(Id_Utilisateurs)
)ENGINE=InnoDB;
CREATE TABLE Commentaire(
        Id_Commentaires Int  Auto_increment  NOT NULL ,
        Titre           Varchar (255) NOT NULL ,
        Description     Varchar (255) NOT NULL ,
        Id_Utilisateurs Int NOT NULL ,
        Id_Rencontre    Int NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (Id_Commentaires)
	,CONSTRAINT Commentaire_Utilisateur_FK FOREIGN KEY (Id_Utilisateurs) REFERENCES Utilisateur(Id_Utilisateurs)
	,CONSTRAINT Commentaire_Rencontre0_FK FOREIGN KEY (Id_Rencontre) REFERENCES Rencontre(Id_Rencontre)
	,CONSTRAINT Commentaire_Rencontre_AK UNIQUE (Id_Rencontre)
)ENGINE=InnoDB;




INSERT INTO Utilisateur (Nom, Prenom, Email, Password, Roles, dateCreation, lastConnect) VALUES
('Dupont', 'Jean', 'jean.dupont@example.com', 'motdepasse123', 'utilisateur', '2023-01-15', '2023-06-20'),
('Dubois', 'Marie', 'marie.dubois@example.com', 'securepwd456', 'utilisateur', '2023-02-20', '2023-06-19'),
('Martin', 'Pierre', 'pierre.martin@example.com', 'strongpass789', 'utilisateur', '2023-03-10', '2023-06-18'),
('Lefevre', 'Sophie', 'sophie.lefevre@example.com', 'mdpsecret321', 'utilisateur', '2023-04-05', '2023-06-17'),
('Leroy', 'Paul', 'paul.leroy@example.com', 'topsecret999', 'administrateur', '2023-05-01', '2023-06-16');


INSERT INTO Visiteur (ip, dateVisite, Id_Utilisateurs) VALUES
('192.168.1.1', '2023-06-20', 1),
('192.168.1.2', '2023-06-19', 2),
('192.168.1.3', '2023-06-18', 3),
('192.168.1.4', '2023-06-17', 4),
('192.168.1.5', '2023-06-16', 5);


INSERT INTO Joueur (nom, prenom, poste, nationalite) VALUES
('James', 'LeBron', 'Ailier', 'Américaine'),
('Antetokounmpo', 'Giannis', 'Ailier Fort', 'Grecque'),
('Durant', 'Kevin', 'Ailier', 'Américaine'),
('Curry', 'Stephen', 'Meneur', 'Américaine'),
('Embiid', 'Joel', 'Pivot', 'Camerounaise'),
('Jokic', 'Nikola', 'Pivot', 'Serbe'),
('Doncic', 'Luka', 'Meneur', 'Slovène'),
('Leonard', 'Kawhi', 'Ailier', 'Américaine'),
('Harden', 'James', 'Arrière', 'Américaine'),
('Davis', 'Anthony', 'Ailier Fort', 'Américaine');


INSERT INTO Joueur (nom, prenom, poste, nationalite) VALUES
('James', 'LeBron', 'Ailier', 'Américaine'),
('Antetokounmpo', 'Giannis', 'Ailier Fort', 'Grecque'),
('Durant', 'Kevin', 'Ailier', 'Américaine'),
('Curry', 'Stephen', 'Meneur', 'Américaine'),
('Embiid', 'Joel', 'Pivot', 'Camerounaise'),
('Jokic', 'Nikola', 'Pivot', 'Serbe'),
('Doncic', 'Luka', 'Meneur', 'Slovène'),
('Leonard', 'Kawhi', 'Ailier', 'Américaine'),
('Harden', 'James', 'Arrière', 'Américaine'),
('Davis', 'Anthony', 'Ailier Fort', 'Américaine');


INSERT INTO Equipe (nomEquipe, paysEquipe, couleurLogo, Id_Joueurs) VALUES
('Los Angeles Lakers', 'États-Unis', 'Violet et Or', 1),
('Milwaukee Bucks', 'États-Unis', 'Vert', 2),
('Brooklyn Nets', 'États-Unis', 'Noir et Blanc', 3),
('Golden State Warriors', 'États-Unis', 'Bleu et Or', 4),
('Philadelphia 76ers', 'États-Unis', 'Bleu et Rouge', 5),
('Denver Nuggets', 'États-Unis', 'Bleu et Or', 6),
('Dallas Mavericks', 'États-Unis', 'Bleu et Blanc', 7),
('Toronto Raptors', 'Canada', 'Rouge', 8),
('Houston Rockets', 'États-Unis', 'Rouge', 9),
('Miami Heat', 'États-Unis', 'Rouge et Noir', 10);


INSERT INTO Rencontre (dateRencontre, equipeA, equipeB, rencontreTerminer, lieu, scoreA, scoreB, Id_Equipes, Id_Utilisateurs) VALUES
('2023-06-01', 1, 2, TRUE, 'Paris', 3, 2, 1, 1),
('2023-06-02', 3, 4, FALSE, 'Turin', 1, 1, 2, 2),
('2023-06-03', 5, 6, TRUE, 'Munich', 2, 0, 3, 3),
('2023-06-04', 1, 3, TRUE, 'Barcelone', 1, 2, 4, 4),
('2023-06-05', 2, 5, FALSE, 'Liverpool', 0, 0, 5, 5),
('2023-06-06', 4, 6, TRUE, 'Madrid', 3, 1, 6, 1),
('2023-06-07', 7, 8, TRUE, 'Manchester', 2, 2, 7, 2),
('2023-06-08', 9, 10, TRUE, 'Milan', 1, 0, 8, 3),
('2023-06-09', 1, 4, FALSE, 'Paris', 1, 1, 9, 4),
('2023-06-10', 3, 6, TRUE, 'Turin', 2, 1, 10, 5);


INSERT INTO Commentaire (Titre, Description, Id_Utilisateurs, Id_Rencontre) VALUES
('Super match!', 'C''était un super match entre les Lakers et les Bucks.', 1, 1),
('Bravo à LeBron!', 'LeBron James a été impressionnant ce soir.', 1, 1),
('Match serré', 'Le match entre les Nets et les Warriors était très serré.', 2, 2),
('Déception', 'Dommage que ce match se soit terminé en match nul.', 2, 2),
('Le suspense jusqu''à la fin', 'Le suspense était à son comble jusqu''à la dernière seconde.', 3, 3),
('Excellent travail', 'Les joueurs ont fait un excellent travail sur le terrain.', 3, 3),
('Magnifique but', 'Ce but restera dans les mémoires.', 4, 4),
('Défense solide', 'La défense de l''équipe A était vraiment solide.', 4, 4),
('Encouragements', 'On continue de supporter notre équipe préférée!', 5, 5),
('Moment historique', 'Ce match marque un moment historique pour l''équipe B.', 5, 5),
('Retournement de situation', 'Quel retournement de situation spectaculaire!', 1, 6),
('Ambiance incroyable', 'L''ambiance dans le stade était incroyable.', 1, 6),
('Supporters passionnés', 'Les supporters de l''équipe B étaient vraiment passionnés.', 2, 7),
('Réaction des joueurs', 'La réaction des joueurs après le match était très émouvante.', 2, 7),
('Précision impressionnante', 'L''équipe A a montré une précision impressionnante.', 3, 8),
('Bravo à l''équipe A!', 'Bravo à l''équipe A pour cette belle victoire.', 3, 8),
('Stratégie gagnante', 'La stratégie de l''entraîneur de l''équipe B a payé.', 4, 9),
('Nouvelle dynamique', 'L''équipe C semble avoir trouvé une nouvelle dynamique.', 4, 9),
('Performance de haut niveau', 'Les joueurs de l''équipe C ont montré une performance de haut niveau.', 5, 10);


-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################
-- ############################################################################################################


ALTER TABLE Commentaire DROP INDEX Commentaire_Rencontre_AK;
ALTER TABLE Commentaire ADD CONSTRAINT Commentaire_Rencontre_AK UNIQUE (Id_Rencontre, Id_Utilisateurs);