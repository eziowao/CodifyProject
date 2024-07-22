#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: types
#------------------------------------------------------------

CREATE TABLE types(
        type_id Int Auto_increment NOT NULL,
        type Varchar(50),
        CONSTRAINT types_PK PRIMARY KEY (type_id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: utilisateurs
#------------------------------------------------------------

CREATE TABLE utilisateurs(
        utilisateur_id Int Auto_increment NOT NULL,
        pseudo Varchar(60),
        email Varchar(255),
        mdp Varchar(60),
        biographie Longtext NOT NULL,
        reseaux_sociaux Varchar(255) NOT NULL,
        classement_id Int,
        classement_id_2 Int,
        classement_id_3 Int,
        CONSTRAINT utilisateurs_PK PRIMARY KEY (utilisateur_id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: contributions
#------------------------------------------------------------

CREATE TABLE contributions(
        contribution_id Int Auto_increment NOT NULL,
        nom Varchar(255),
        date Date,
        utilisateur_id Int NOT NULL,
        challenge_id Int NOT NULL,
        CONSTRAINT contributions_PK PRIMARY KEY (contribution_id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: challenges
#------------------------------------------------------------

CREATE TABLE challenges(
        challenge_id Int Auto_increment NOT NULL,
        nom Varchar(255),
        date Date,
        description Longtext NOT NULL,
        type_id Int NOT NULL,
        utilisateur_id Int NOT NULL,
        CONSTRAINT challenges_PK PRIMARY KEY (challenge_id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: likes
#------------------------------------------------------------

CREATE TABLE likes(
        like_id Int Auto_increment NOT NULL,
        like_count Int,
        utilisateur_id Int NOT NULL,
        contribution_id Int NOT NULL,
        classement_id Int,
        classement_id_2 Int,
        classement_id_3 Int,
        CONSTRAINT likes_PK PRIMARY KEY (like_id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: classements
#------------------------------------------------------------

CREATE TABLE classements(
        classement_id Int Auto_increment NOT NULL,
        classement Int,
        classement_type_id Int,
        CONSTRAINT classements_PK PRIMARY KEY (classement_id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: classements_types
#------------------------------------------------------------

CREATE TABLE classements_types(
        classement_type_id Int Auto_increment NOT NULL,
        temporalite Varchar(50),
        classement_id Int,
        CONSTRAINT classements_types_PK PRIMARY KEY (classement_type_id)
) ENGINE=InnoDB;

ALTER TABLE utilisateurs
    ADD CONSTRAINT utilisateurs_classements0_FK
    FOREIGN KEY (classement_id) REFERENCES classements(classement_id),
    ADD CONSTRAINT utilisateurs_classements1_FK
    FOREIGN KEY (classement_id_2) REFERENCES classements(classement_id),
    ADD CONSTRAINT utilisateurs_classements2_FK
    FOREIGN KEY (classement_id_3) REFERENCES classements(classement_id);

ALTER TABLE contributions
    ADD CONSTRAINT contributions_utilisateurs0_FK
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(utilisateur_id),
    ADD CONSTRAINT contributions_challenges1_FK
    FOREIGN KEY (challenge_id) REFERENCES challenges(challenge_id);

ALTER TABLE challenges
    ADD CONSTRAINT challenges_types0_FK
    FOREIGN KEY (type_id) REFERENCES types(type_id),
    ADD CONSTRAINT challenges_utilisateurs1_FK
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(utilisateur_id);

ALTER TABLE likes
    ADD CONSTRAINT likes_utilisateurs0_FK
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(utilisateur_id),
    ADD CONSTRAINT likes_contributions1_FK
    FOREIGN KEY (contribution_id) REFERENCES contributions(contribution_id),
    ADD CONSTRAINT likes_classements2_FK
    FOREIGN KEY (classement_id) REFERENCES classements(classement_id),
    ADD CONSTRAINT likes_classements3_FK
    FOREIGN KEY (classement_id_2) REFERENCES classements(classement_id),
    ADD CONSTRAINT likes_classements4_FK
    FOREIGN KEY (classement_id_3) REFERENCES classements(classement_id);

ALTER TABLE classements
    ADD CONSTRAINT classements_classements_types0_FK
    FOREIGN KEY (classement_type_id) REFERENCES classements_types(classement_type_id);

ALTER TABLE classements_types
    ADD CONSTRAINT classements_types_classements0_FK
    FOREIGN KEY (classement_id) REFERENCES classements(classement_id);
